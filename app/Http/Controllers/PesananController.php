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
        $semuaPesanan = Pesanan::with('tarifPeran.logProgres')->orderBy('tanggal_deadline', 'asc')->get();

        // Data untuk Top Cards
        $totalPesananAktif = $semuaPesanan->where('status_pesanan', 'Pengerjaan')->count();
        $targetPcsPesanan = $semuaPesanan->where('status_pesanan', 'Pengerjaan')->sum('target_total_pcs');
        $pesananSelesai = $semuaPesanan->where('status_pesanan', 'Selesai')->count();

        // Hitung Progres untuk Semua Pesanan
        foreach ($semuaPesanan as $p) {
            $selesai = 0;
            foreach ($p->tarifPeran as $tp) {
                $selesai += $tp->logProgres->sum('jumlah_selesai_hari_ini');
            }

            // LOGIKA BARU: Cegah angka 'selesai_pcs' melebihi target
            if ($selesai > $p->target_total_pcs) {
                $p->selesai_pcs = $p->target_total_pcs; // Mentok di angka target
            } else {
                $p->selesai_pcs = $selesai;
            }

            // Persentase juga dicegah agar tidak lebih dari 100%
            $persentase = $p->target_total_pcs > 0 ? round(($selesai / $p->target_total_pcs) * 100) : 0;
            $p->progress_persen = $persentase > 100 ? 100 : $persentase;
        }

        // PISAHKAN DATA UNTUK 2 TABEL
        $pesananAktif = $semuaPesanan->where('status_pesanan', 'Pengerjaan');
        $daftarSelesai = $semuaPesanan->where('status_pesanan', 'Selesai');

        return view('pesanan.index', compact('pesananAktif', 'daftarSelesai', 'totalPesananAktif', 'targetPcsPesanan', 'pesananSelesai'));
    }

    // Fungsi BARU: Eksekusi Tandai Selesai
    public function tandaiSelesai($id)
    {
        $pesanan = Pesanan::with('tarifPeran.logProgres')->findOrFail($id);

        // Hitung ulang progres di backend untuk keamanan ganda
        $selesai = 0;
        foreach ($pesanan->tarifPeran as $tp) {
            $selesai += $tp->logProgres->sum('jumlah_selesai_hari_ini');
        }
        $persentase = $pesanan->target_total_pcs > 0 ? round(($selesai / $pesanan->target_total_pcs) * 100) : 0;

        // Validasi: Tolak jika belum 100%
        if ($persentase < 100) {
            return back()->with('error', 'Gagal! Pesanan belum mencapai target 100%.');
        }

        // Jika lolos, ubah statusnya!
        $pesanan->update(['status_pesanan' => 'Selesai']);

        return back()->with('success', 'Mantap! Pesanan ' . $pesanan->nama_pesanan . ' telah resmi diselesaikan dan dipindahkan ke arsip.');
    }

    // ... (Biarkan fungsi create() dan store() persis seperti yang lama) ...
    public function create()
    {
        return view('pesanan.create');
    }
    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'nama_pesanan' => 'required|string',
            'nama_klien' => 'required|string',
            'tanggal_deadline' => 'required|date',
            'target_total_pcs' => 'required|integer'
        ]);

        // Mulai Jurus DB Transaction!
        DB::beginTransaction();

        try {
            // A. Simpan Data Induk (Pesanan)
            $pesananBaru = Pesanan::create([
                'nama_pesanan' => $request->nama_pesanan,
                'nama_klien' => $request->nama_klien,
                'no_hp_klien' => $request->no_hp_klien,
                'tanggal_deadline' => $request->tanggal_deadline,
                'target_total_pcs' => $request->target_total_pcs,
                'status_pesanan' => 'Pengerjaan'
            ]);

            // B. Simpan Tarif Peran Dinamis (Potong, Jahit, Packaging)
            // Menggunakan filled() agar aman jika form dikosongkan
            if ($request->filled('tarif_potong') && $request->tarif_potong > 0) {
                TarifPeranPesanan::create([
                    'id_pesanan' => $pesananBaru->id_pesanan,
                    'peran' => 'Pola & Potong',
                    'tarif_per_pcs' => $request->tarif_potong
                ]);
            }
            if ($request->filled('tarif_jahit') && $request->tarif_jahit > 0) {
                TarifPeranPesanan::create([
                    'id_pesanan' => $pesananBaru->id_pesanan,
                    'peran' => 'Menjahit',
                    'tarif_per_pcs' => $request->tarif_jahit
                ]);
            }
            if ($request->filled('tarif_packaging') && $request->tarif_packaging > 0) {
                TarifPeranPesanan::create([
                    'id_pesanan' => $pesananBaru->id_pesanan,
                    'peran' => 'Packaging',
                    'tarif_per_pcs' => $request->tarif_packaging
                ]);
            }

            // Jika semua berhasil, simpan permanen ke MySQL!
            DB::commit();

            return redirect('/pesanan')->with('success', 'Pesanan baru dan pengaturan tarifnya berhasil dibuat!');
        } catch (\Exception $e) {
            // Jika ada error di tengah jalan, batalkan semua insert data!
            DB::rollBack();
            // Kita kembalikan input user (withInput) dan kirim pesan error spesifik!
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
}
