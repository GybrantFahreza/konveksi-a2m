<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Absensi;
use App\Models\BahanBaku;
use App\Models\BarangJadi;
use App\Models\Pesanan;
use App\Models\ArusKas;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $hariIni = Carbon::now()->toDateString();

        // 1. DATA KARYAWAN & KEHADIRAN HARI INI
        $totalKaryawan = Karyawan::where('status_karyawan', 'Aktif')->count();
        $karyawanHadir = Absensi::where('tanggal', $hariIni)->where('status_hadir', 'Hadir')->count();

        // 2. DATA KEUANGAN (SALDO SAAT INI)
        $pemasukan = ArusKas::where('tipe_arus', 'Masuk')->sum('nominal');
        $pengeluaran = ArusKas::where('tipe_arus', 'Keluar')->sum('nominal');
        $saldoKas = $pemasukan - $pengeluaran;

        // 3. DATA PESANAN (AKTIF & MENDESAK)
        $pesananAktif = Pesanan::where('status_pesanan', 'Pengerjaan')->count();
        // Ambil 3 pesanan dengan deadline paling dekat
        $pesananMendesak = Pesanan::where('status_pesanan', 'Pengerjaan')
            ->orderBy('tanggal_deadline', 'asc')
            ->take(3)
            ->get();

        // 4. DATA PERINGATAN STOK KRITIS
        // Menggunakan perbandingan kolom stok_sekarang dengan batas_kritis
        $stokBahanKritis = BahanBaku::whereColumn('stok_sekarang', '<=', 'batas_kritis')->get();
        // Untuk Barang Jadi, karena kemarin kita pakai patokan angka 10
        $stokBarangJadiKritis = BarangJadi::where('stok_sekarang', '<=', 10)->get();

        return view('dashboard.index', compact(
            'totalKaryawan',
            'karyawanHadir',
            'saldoKas',
            'pesananAktif',
            'pesananMendesak',
            'stokBahanKritis',
            'stokBarangJadiKritis'
        ));
    }
}
