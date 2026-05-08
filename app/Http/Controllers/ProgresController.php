<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogProgresHarian;
use App\Models\Karyawan;
use App\Models\TarifPeranPesanan;

class ProgresController extends Controller
{
    // 1. Tampilkan Riwayat Progres
    public function index()
    {
        // Tarik data log, sertakan relasi Karyawan dan Tarif Peran (beserta Pesanannya)
        $logs = LogProgresHarian::with(['karyawan', 'tarifPeran.pesanan'])
            ->orderBy('tanggal_input', 'desc')
            ->get();

        return view('progres.index', compact('logs'));
    }

    // 2. Tampilkan Form Input Progres
    public function create()
    {
        // Hanya ambil karyawan yang masih aktif
        $karyawan = Karyawan::where('status_karyawan', 'Aktif')->get();

        // Ambil daftar pekerjaan dari pesanan yang statusnya masih 'Pengerjaan'
        $tarifPeran = TarifPeranPesanan::with('pesanan')
            ->whereHas('pesanan', function ($query) {
                $query->where('status_pesanan', 'Pengerjaan');
            })->get();

        return view('progres.create', compact('karyawan', 'tarifPeran'));
    }

    // 3. Simpan Data Progres (DENGAN SATPAM VALIDASI TARGET)
    public function store(Request $request)
    {
        $request->validate([
            'id_karyawan' => 'required',
            'id_tarif_peran' => 'required',
            'tanggal_input' => 'required|date',
            'ukuran_s' => 'nullable|integer|min:0',
            'ukuran_m' => 'nullable|integer|min:0',
            'ukuran_l' => 'nullable|integer|min:0',
            'ukuran_xl' => 'nullable|integer|min:0',
            'ukuran_xxl' => 'nullable|integer|min:0',
            'ukuran_3xl' => 'nullable|integer|min:0',
        ]);

        // Hitung total otomatis dari rincian ukuran yang diinput
        $totalSelesai = ($request->ukuran_s ?? 0) +
            ($request->ukuran_m ?? 0) +
            ($request->ukuran_l ?? 0) +
            ($request->ukuran_xl ?? 0) +
            ($request->ukuran_xxl ?? 0) +
            ($request->ukuran_3xl ?? 0);

        // Jika form kosong semua
        if ($totalSelesai == 0) {
            return back()->withInput()->with('error', 'Gagal! Total Pcs tidak boleh 0. Isi minimal satu ukuran.');
        }

        // ================================================================
        // LOGIKA SATPAM: CEK TARGET PESANAN
        // ================================================================
        // 1. Ambil data pesanan dan posisinya
        $tarifPeran = \App\Models\TarifPeranPesanan::with('pesanan')->findOrFail($request->id_tarif_peran);
        $pesanan = $tarifPeran->pesanan;

        // 2. Hitung berapa pcs yang SUDAH dikerjakan khusus untuk posisi (tugas) ini
        $sudahDikerjakan = \App\Models\LogProgresHarian::where('id_tarif_peran', $request->id_tarif_peran)
            ->sum('jumlah_selesai_hari_ini');

        // 3. Cek apakah total lama + inputan baru melebihi target pesanan?
        if (($sudahDikerjakan + $totalSelesai) > $pesanan->target_total_pcs) {
            $sisaKuota = $pesanan->target_total_pcs - $sudahDikerjakan;

            return back()->withInput()->with(
                'error',
                "⛔ Gagal! Input melebihi target. Target pesanan: {$pesanan->target_total_pcs} pcs. " .
                    "Posisi {$tarifPeran->peran} sudah mengerjakan {$sudahDikerjakan} pcs. " .
                    "SISA KUOTA yang bisa diinput tinggal: {$sisaKuota} pcs."
            );
        }
        // ================================================================

        // Jika lolos dari satpam, baru simpan ke Database!
        LogProgresHarian::create([
            'id_karyawan' => $request->id_karyawan,
            'id_tarif_peran' => $request->id_tarif_peran,
            'tanggal_input' => $request->tanggal_input,
            'ukuran_s' => $request->ukuran_s ?? 0,
            'ukuran_m' => $request->ukuran_m ?? 0,
            'ukuran_l' => $request->ukuran_l ?? 0,
            'ukuran_xl' => $request->ukuran_xl ?? 0,
            'ukuran_xxl' => $request->ukuran_xxl ?? 0,
            'ukuran_3xl' => $request->ukuran_3xl ?? 0,
            'jumlah_selesai_hari_ini' => $totalSelesai,
            'status_penggajian' => 'Belum Dibayar'
        ]);

        return redirect('/pesanan')->with('success', 'Setoran progres harian berhasil dicatat!');
    }

    // 4. Update Data Progres (Sama seperti store, ada validasi target)
    // --- FUNGSI UPDATE (UNTUK EDIT) ---
    public function update(Request $request, $id_pesanan, $id_log)
    {
        $request->validate([
            'ukuran_s' => 'nullable|integer|min:0',
            'ukuran_m' => 'nullable|integer|min:0',
            'ukuran_l' => 'nullable|integer|min:0',
            'ukuran_xl' => 'nullable|integer|min:0',
            'ukuran_xxl' => 'nullable|integer|min:0',
            'ukuran_3xl' => 'nullable|integer|min:0',
        ]);

        $log = LogProgresHarian::findOrFail($id_log);
        $tarifPeran = TarifPeranPesanan::with('pesanan')->findOrFail($log->id_tarif_peran);
        $pesanan = $tarifPeran->pesanan;

        $totalBaru = ($request->ukuran_s ?? 0) + ($request->ukuran_m ?? 0) + ($request->ukuran_l ?? 0) +
            ($request->ukuran_xl ?? 0) + ($request->ukuran_xxl ?? 0) + ($request->ukuran_3xl ?? 0);

        // Hitung sum log lain (kecuali yang lagi diedit ini)
        $sudahDikerjakanLainnya = LogProgresHarian::where('id_tarif_peran', $log->id_tarif_peran)
            ->where('id_log', '!=', $id_log)
            ->sum('jumlah_selesai_hari_ini');

        // VALIDASI TARGET DI EDIT
        if (($sudahDikerjakanLainnya + $totalBaru) > $pesanan->target_total_pcs) {
            $maksimal = $pesanan->target_total_pcs - $sudahDikerjakanLainnya;
            return back()->withInput()->with('error', "⛔ EDIT GAGAL! Total melebihi target. Maksimal yang boleh diinput untuk baris ini: {$maksimal} pcs.");
        }

        $log->update([
            'ukuran_s' => $request->ukuran_s ?? 0,
            'ukuran_m' => $request->ukuran_m ?? 0,
            'ukuran_l' => $request->ukuran_l ?? 0,
            'ukuran_xl' => $request->ukuran_xl ?? 0,
            'ukuran_xxl' => $request->ukuran_xxl ?? 0,
            'ukuran_3xl' => $request->ukuran_3xl ?? 0,
            'jumlah_selesai_hari_ini' => $totalBaru,
        ]);

        return redirect("/pesanan/{$id_pesanan}/detail")->with('success', 'Progres berhasil diperbarui!');
    }

    // 5. Hapus Riwayat Progres
    public function destroy($id_pesanan, $id_log)
    {
        $log = LogProgresHarian::findOrFail($id_log);
        $log->delete();

        return redirect("/pesanan/{$id_pesanan}/detail")->with('success', 'Riwayat progres berhasil dihapus.');
    }
}
