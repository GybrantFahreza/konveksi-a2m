<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\LogProgresHarian;
use App\Models\ArusKas;
use Carbon\Carbon;

class KeuanganController extends Controller
{
    // =========================================================================
    // 1. BAGIAN DASHBOARD KEUANGAN UTAMA (GABUNGAN ARUS KAS & GAJI)
    // =========================================================================
    public function index()
    {
        $bulanIni = \Carbon\Carbon::now()->month;
        $tahunIni = \Carbon\Carbon::now()->year;

        // A. DATA ARUS KAS
        $arusKas = ArusKas::orderBy('tanggal_transaksi', 'desc')->get();

        $pemasukanBulanIni = $arusKas->where('tipe_arus', 'Masuk')
            ->whereBetween('tanggal_transaksi', [\Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()->endOfMonth()])
            ->sum('nominal');

        $pengeluaranBulanIni = $arusKas->where('tipe_arus', 'Keluar')
            ->whereBetween('tanggal_transaksi', [\Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()->endOfMonth()])
            ->sum('nominal');

        $saldoSaatIni = $arusKas->where('tipe_arus', 'Masuk')->sum('nominal') - $arusKas->where('tipe_arus', 'Keluar')->sum('nominal');

        // B. DATA PENGGAJIAN KARYAWAN
        $karyawan = Karyawan::with(['logProgres' => function ($query) {
            $query->where('status_penggajian', 'Belum Dibayar')->with('tarifPeran');
        }])->where('status_karyawan', 'Aktif')->get();

        $rekapGaji = $karyawan->map(function ($k) {
            $totalGaji = 0;
            $totalPcs = 0;
            foreach ($k->logProgres as $log) {
                $totalGaji += ($log->jumlah_selesai_hari_ini * $log->tarifPeran->tarif_per_pcs);
                $totalPcs += $log->jumlah_selesai_hari_ini;
            }
            return (object)[
                'id_karyawan' => $k->id_karyawan,
                'nama_karyawan' => $k->nama_karyawan,
                'total_pcs' => $totalPcs,
                'total_gaji' => $totalGaji,
                'sisa_gaji' => $totalGaji
            ];
        })->filter(function ($item) {
            return $item->total_gaji > 0;
        });

        $totalSeluruhGaji = $rekapGaji->sum('total_gaji');

        return view('keuangan.index', compact('arusKas', 'pemasukanBulanIni', 'pengeluaranBulanIni', 'saldoSaatIni', 'rekapGaji', 'totalSeluruhGaji'));
    }

    // =========================================================================
    // 2. BAGIAN CRUD TRANSAKSI BUKU KAS (MANUAL)
    // =========================================================================

    // Form Tambah Transaksi
    public function create()
    {
        return view('keuangan.create');
    }

    // Simpan Transaksi Baru
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_transaksi' => 'required|date',
            'kategori' => 'required|string',
            'tipe_arus' => 'required|in:Masuk,Keluar',
            'banyak' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
            'status_transaksi' => 'required|in:Lunas,Belum Lunas'
        ]);

        $totalNominal = $request->banyak * $request->harga;

        ArusKas::create([
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi ?? '-', // Cegah Error Null
            'tipe_arus' => $request->tipe_arus,
            'banyak' => $request->banyak,
            'harga' => $request->harga,
            'nominal' => $totalNominal,
            'status_transaksi' => $request->status_transaksi
        ]);

        return redirect('/keuangan')->with('success', 'Transaksi berhasil dicatat!');
    }

    // Form Edit Transaksi
    public function edit($id)
    {
        $kas = ArusKas::findOrFail($id);
        return view('keuangan.edit', compact('kas'));
    }

    // Update Transaksi
    public function update(Request $request, $id)
    {
        // Tambahkan validasi agar aman!
        $request->validate([
            'tanggal_transaksi' => 'required|date',
            'kategori' => 'required|string',
            'tipe_arus' => 'required|in:Masuk,Keluar',
            'banyak' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
            'status_transaksi' => 'required|in:Lunas,Belum Lunas'
        ]);

        $kas = ArusKas::findOrFail($id);
        $totalNominal = $request->banyak * $request->harga;

        $kas->update([
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi ?? '-', // Cegah Error Null
            'tipe_arus' => $request->tipe_arus,
            'banyak' => $request->banyak,
            'harga' => $request->harga,
            'nominal' => $totalNominal,
            'status_transaksi' => $request->status_transaksi
        ]);

        return redirect('/keuangan')->with('success', 'Transaksi berhasil diperbarui!');
    }

    // Hapus Transaksi
    public function destroy($id)
    {
        $kas = ArusKas::findOrFail($id);
        $kas->delete();
        return redirect('/keuangan')->with('success', 'Transaksi berhasil dihapus!');
    }


    // =========================================================================
    // 3. BAGIAN PENGGAJIAN (OTOMATISASI ARUS KAS)
    // =========================================================================

    // Halaman Detail Penggajian Karyawan (Spesifik satu orang)
    public function detailGaji($id_karyawan)
    {
        $karyawan = Karyawan::findOrFail($id_karyawan);

        $logs = LogProgresHarian::with('tarifPeran.pesanan')
            ->where('id_karyawan', $id_karyawan)
            ->where('status_penggajian', 'Belum Dibayar')
            ->orderBy('tanggal_input', 'desc')
            ->get();

        return view('keuangan.detail_gaji', compact('karyawan', 'logs'));
    }

    // Fungsi Eksekusi Pembayaran Gaji (Otomatis masuk ke Buku Kas)
    public function bayarGaji($id_karyawan)
    {
        $karyawan = Karyawan::findOrFail($id_karyawan);

        $logs = LogProgresHarian::with('tarifPeran')
            ->where('id_karyawan', $id_karyawan)
            ->where('status_penggajian', 'Belum Dibayar')
            ->get();

        if ($logs->isEmpty()) {
            return back()->with('error', 'Tidak ada tagihan gaji untuk karyawan ini.');
        }

        $totalBayar = 0;
        foreach ($logs as $log) {
            $totalBayar += ($log->jumlah_selesai_hari_ini * $log->tarifPeran->tarif_per_pcs);
        }

        // A. Ubah status log progres menjadi "Sudah Dibayar"
        LogProgresHarian::where('id_karyawan', $id_karyawan)
            ->where('status_penggajian', 'Belum Dibayar')
            ->update(['status_penggajian' => 'Sudah Dibayar']);

        // B. Catat otomatis ke Arus Kas (DENGAN STRUKTUR KOLOM BARU YANG AMAN!)
        ArusKas::create([
            'tanggal_transaksi' => Carbon::now()->toDateString(),
            'kategori' => 'Gaji Karyawan',
            'deskripsi' => 'Pembayaran gaji borongan untuk Sdr/i ' . $karyawan->nama_karyawan,
            'tipe_arus' => 'Keluar',
            'banyak' => 1,                      // Diisi 1 karena ini total paketan gaji
            'harga' => $totalBayar,             // Harga diisi sebesar total gajinya
            'nominal' => $totalBayar,
            'status_transaksi' => 'Lunas'       // Pasti Lunas
        ]);

        // C. Redirect kembali ke menu Keuangan (bukan ke menu Gaji lama)
        return redirect('/keuangan')->with('success', 'Berhasil! Gaji sebesar Rp ' . number_format($totalBayar, 0, ',', '.') . ' telah dibayarkan kepada ' . $karyawan->nama_karyawan . ' dan tercatat di Buku Kas pengeluaran.');
    }

    // Fungsi Cetak Laporan
    public function cetakLaporan()
    {
        $arusKas = ArusKas::orderBy('tanggal_transaksi', 'asc')->get();

        $pemasukan = $arusKas->where('tipe_arus', 'Masuk')->sum('nominal');
        $pengeluaran = $arusKas->where('tipe_arus', 'Keluar')->sum('nominal');
        $saldo = $pemasukan - $pengeluaran;

        return view('keuangan.cetak', compact('arusKas', 'pemasukan', 'pengeluaran', 'saldo'));
    }
}
