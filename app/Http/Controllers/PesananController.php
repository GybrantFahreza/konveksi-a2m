<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pesanan;
use App\Models\DetailUkuranPesanan;
use App\Models\TarifPeranPesanan;
use App\Models\LogProgresHarian; // Tambahkan ini

class PesananController extends Controller
{
    // 1. Tampilkan Daftar Pesanan & Top Cards
    // 1. Tampilkan Daftar Pesanan & Top Cards
    public function index()
    {
        // Ambil data pesanan aktif
        $pesananAktif = Pesanan::with('tarifPeran.logProgres')
            ->where('status_pesanan', 'Pengerjaan')
            ->orderBy('tanggal_deadline', 'asc')
            ->get();

        // Loop untuk menyuntikkan logika "Hanya Packaging"
        foreach ($pesananAktif as $p) {
            // 1. Cari data peran yang namanya 'Packaging' untuk pesanan ini
            $packaging = $p->tarifPeran->where('peran', 'Packaging')->first();

            // 2. Hitung jumlah yang sudah dipacking
            $p->selesai_pcs = $packaging ? $packaging->logProgres->sum('jumlah_selesai_hari_ini') : 0;

            // 3. Hitung persentase progres (Packaging / Total Target)
            $p->progress_persen = $p->target_total_pcs > 0
                ? round(($p->selesai_pcs / $p->target_total_pcs) * 100)
                : 0;
        }

        // Ambil data pesanan selesai (opsional, untuk tabel bawah)
        $daftarSelesai = Pesanan::where('status_pesanan', 'Selesai')->get();

        // Data ringkasan (Cards)
        $totalPesananAktif = $pesananAktif->count();
        $targetPcsPesanan = $pesananAktif->sum('target_total_pcs');
        $pesananSelesai = $daftarSelesai->count();

        return view('pesanan.index', compact(
            'pesananAktif',
            'daftarSelesai',
            'totalPesananAktif',
            'targetPcsPesanan',
            'pesananSelesai'
        ));
    }

    // Fungsi BARU: Eksekusi Tandai Selesai
    public function tandaiSelesai($id)
    {
        $pesanan = Pesanan::with('tarifPeran.logProgres')->findOrFail($id);

        // Cari khusus peran 'Packaging'
        $packaging = $pesanan->tarifPeran->where('peran', 'Packaging')->first();

        // Hitung selesai berdasarkan packaging
        $selesaiPackaging = $packaging ? $packaging->logProgres->sum('jumlah_selesai_hari_ini') : 0;

        $persentase = $pesanan->target_total_pcs > 0
            ? round(($selesaiPackaging / $pesanan->target_total_pcs) * 100)
            : 0;

        // Validasi: Tolak jika Packaging belum 100%
        if ($persentase < 100) {
            return back()->with('error', 'Gagal! Pesanan belum bisa diselesaikan karena progres PACKAGING belum mencapai 100%.');
        }

        // Jika lolos, ubah statusnya!
        $pesanan->update(['status_pesanan' => 'Selesai']);

        return back()->with('success', 'Mantap! Pesanan ' . $pesanan->nama_pesanan . ' telah resmi diselesaikan (Packaging 100%) dan diarsipkan.');
    }

    // ... (Biarkan fungsi create() dan store() persis seperti yang lama) ...
    public function create()
    {
        return view('pesanan.create');
    }
    public function store(Request $request)
    {
        // 1. Validasi input (TIDAK ADA LAGI target_total_pcs)
        $request->validate([
            'nama_pesanan' => 'required|string',
            'nama_klien' => 'required|string',
            'tanggal_deadline' => 'required|date',
            'target_s' => 'nullable|integer|min:0',
            'target_m' => 'nullable|integer|min:0',
            'target_l' => 'nullable|integer|min:0',
            'target_xl' => 'nullable|integer|min:0',
            'target_xxl' => 'nullable|integer|min:0',
            'target_3xl' => 'nullable|integer|min:0',
        ]);

        // Hitung total otomatis murni dari inputan rincian size
        $totalTargetOtomatis = ($request->target_s ?? 0) + ($request->target_m ?? 0) +
            ($request->target_l ?? 0) + ($request->target_xl ?? 0) +
            ($request->target_xxl ?? 0) + ($request->target_3xl ?? 0);

        // Validasi: Jangan sampai disave kalau ukurannya 0 semua (form kosong)
        if ($totalTargetOtomatis == 0) {
            return back()->withInput()->with('error', '⛔ Gagal Simpan! Anda belum memasukkan rincian ukuran sama sekali. Minimal harus ada 1 pcs pakaian.');
        }

        // Mulai Jurus DB Transaction!
        DB::beginTransaction();

        try {
            // A. Simpan Data Induk (Pesanan)
            $pesananBaru = Pesanan::create([
                'nama_pesanan' => $request->nama_pesanan,
                'nama_klien' => $request->nama_klien,
                'no_hp_klien' => $request->no_hp_klien,
                'tanggal_deadline' => $request->tanggal_deadline,
                'target_total_pcs' => $totalTargetOtomatis, // 👈 TOTALNYA OTOMATIS MASUK KE SINI SOB!
                'target_s' => $request->target_s ?? 0,
                'target_m' => $request->target_m ?? 0,
                'target_l' => $request->target_l ?? 0,
                'target_xl' => $request->target_xl ?? 0,
                'target_xxl' => $request->target_xxl ?? 0,
                'target_3xl' => $request->target_3xl ?? 0,
                'status_pesanan' => 'Pengerjaan'
            ]);

            // B. Simpan Tarif Peran Dinamis (Potong, Jahit, Packaging)
            if ($request->filled('tarif_potong') && $request->tarif_potong > 0) {
                \App\Models\TarifPeranPesanan::create([
                    'id_pesanan' => $pesananBaru->id_pesanan,
                    'peran' => 'Pola & Potong',
                    'tarif_per_pcs' => $request->tarif_potong
                ]);
            }
            if ($request->filled('tarif_jahit') && $request->tarif_jahit > 0) {
                \App\Models\TarifPeranPesanan::create([
                    'id_pesanan' => $pesananBaru->id_pesanan,
                    'peran' => 'Menjahit',
                    'tarif_per_pcs' => $request->tarif_jahit
                ]);
            }
            if ($request->filled('tarif_packaging') && $request->tarif_packaging > 0) {
                \App\Models\TarifPeranPesanan::create([
                    'id_pesanan' => $pesananBaru->id_pesanan,
                    'peran' => 'Packaging',
                    'tarif_per_pcs' => $request->tarif_packaging
                ]);
            }

            // Jika semua berhasil, simpan permanen ke MySQL!
            DB::commit();

            return redirect('/pesanan')->with('success', 'Mantap! Pesanan baru berhasil disimpan dengan target otomatis ' . $totalTargetOtomatis . ' pcs!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal menyimpan ke Database! Pesan Error: ' . $e->getMessage());
        }
    }

    // 1. Fungsi Detail (Menampilkan per hari)
    public function detail($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        // Menarik log berdasarkan relasi tarifPeran
        $logs = LogProgresHarian::with(['karyawan', 'tarifPeran'])
            ->whereHas('tarifPeran', function ($q) use ($id) {
                $q->where('id_pesanan', $id);
            })
            ->orderBy('tanggal_input', 'desc')
            ->get();

        return view('pesanan.detail', compact('pesanan', 'logs'));
    }

    // 2. Fungsi Form Edit Progres
    public function editProgres($id_pesanan, $id_log)
    {
        $pesanan = Pesanan::findOrFail($id_pesanan);
        $log = LogProgresHarian::with(['karyawan', 'tarifPeran'])->findOrFail($id_log);

        // Pastikan nama file view-nya benar (pakai underscore atau strip)
        return view('pesanan.edit_progres', compact('pesanan', 'log'));
    }

    // 3. Fungsi Update Progres (Hanya ubah hari itu saja)
    public function updateProgres(Request $request, $id_pesanan, $id_log)
    {
        $log = LogProgresHarian::findOrFail($id_log);

        // Total otomatis dihitung dari penjumlahan semua ukuran
        $totalSelesai = $request->ukuran_s + $request->ukuran_m + $request->ukuran_l +
            $request->ukuran_xl + $request->ukuran_xxl + $request->ukuran_3xl;

        $log->update([
            'ukuran_s' => $request->ukuran_s,
            'ukuran_m' => $request->ukuran_m,
            'ukuran_l' => $request->ukuran_l,
            'ukuran_xl' => $request->ukuran_xl,
            'ukuran_xxl' => $request->ukuran_xxl,
            'ukuran_3xl' => $request->ukuran_3xl,
            'jumlah_selesai_hari_ini' => $totalSelesai // Menimpa total lama dengan yang baru
        ]);

        return redirect("/pesanan/{$id_pesanan}/detail")->with('success', 'Data progres harian berhasil dikoreksi!');
    }

    // 4. Fungsi Hapus Progres
    public function destroyProgres($id_pesanan, $id_log)
    {
        $log = LogProgresHarian::findOrFail($id_log);
        $log->delete(); // Hanya menghapus log di hari itu saja!

        return redirect("/pesanan/{$id_pesanan}/detail")->with('success', 'Riwayat pengerjaan di hari tersebut berhasil dihapus.');
    }

    // Menampilkan Detail Pesanan
    public function show($id)
    {
        // 1. Cari data pesanan berdasarkan ID
        $pesanan = \App\Models\Pesanan::findOrFail($id);

        // 2. Tarik data dari model LogProgresHarian yang aslinya
        $logs = \App\Models\LogProgresHarian::where('id_pesanan', $id)
            ->with(['karyawan', 'tarifPeran']) // Memanggil relasi
            ->orderBy('tanggal_input', 'desc')
            ->get();

        // 3. Kirim ke halaman detail
        return view('pesanan.detail', compact('pesanan', 'logs'));
    }
    // Fungsi untuk Menghapus Pesanan
    public function destroy($id)
    {
        try {
            $pesanan = \App\Models\Pesanan::findOrFail($id);

            // 1. Cari semua ID Tarif Peran milik pesanan ini
            $tarifPeranIds = \App\Models\TarifPeranPesanan::where('id_pesanan', $id)->pluck('id_tarif_peran');

            // 2. Hapus semua riwayat progres yang terkait dengan tarif peran tersebut (agar tidak error / nyangkut)
            \App\Models\LogProgresHarian::whereIn('id_tarif_peran', $tarifPeranIds)->delete();

            // 3. Hapus pengaturan tarif borongannya
            \App\Models\TarifPeranPesanan::where('id_pesanan', $id)->delete();

            // 4. Terakhir, eksekusi hapus pesanannya!
            $pesanan->delete();

            return redirect('/pesanan')->with('success', 'Pesanan ' . $pesanan->nama_pesanan . ' beserta seluruh riwayatnya berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus pesanan! Pesan Error: ' . $e->getMessage());
        }
    }
}
