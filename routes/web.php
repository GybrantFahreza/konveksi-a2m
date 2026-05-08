<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\ProgresController;

// ==========================================
// 1. RUTE KHUSUS LOGIN & LOGOUT (TIDAK DIGEMBOK)
// ==========================================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ==========================================
// 2. KELOMPOK RUTE YANG DIGEMBOK (HARUS LOGIN)
// ==========================================
Route::middleware(['auth'])->group(function () {

    // --- DASHBOARD ---
    Route::get('/', [DashboardController::class, 'index']);

    // --- MANAJEMEN KARYAWAN ---
    Route::get('/karyawan', [KaryawanController::class, 'index']);
    Route::get('/karyawan/create', [KaryawanController::class, 'create']);
    Route::post('/karyawan', [KaryawanController::class, 'store']);

    //  RUTE ABSENSI SUDAH DIPERBAIKI & DIPINDAH KE SINI 
    Route::post('/karyawan/absensi', [KaryawanController::class, 'simpanAbsensi']);

    // --- RUTE DENGAN {id} HARUS DI BAWAH ---
    Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit']);
    Route::put('/karyawan/{id}', [KaryawanController::class, 'update']);
    Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']);
    Route::get('/karyawan/{id}/detail', [KaryawanController::class, 'detailLaporan']); // --- MANAJEMEN KARYAWAN ---
    Route::get('/karyawan', [KaryawanController::class, 'index']);
    Route::get('/karyawan/create', [KaryawanController::class, 'create']);
    Route::post('/karyawan', [KaryawanController::class, 'store']);
    Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit']);
    Route::put('/karyawan/{id}', [KaryawanController::class, 'update']);
    Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']);
    Route::post('/absensi', [KaryawanController::class, 'simpanAbsensi']);
    Route::get('/karyawan/{id}/detail', [KaryawanController::class, 'detailLaporan']);

    // --- MANAJEMEN STOK ---
    // 1. Halaman Utama Stok
    Route::get('/stok', [StokController::class, 'index']);

    // 2. Fitur Tambah Bahan Baku (Halaman Terpisah)
    Route::get('/stok/create', [StokController::class, 'create']); // Membuka file create.blade.php
    Route::post('/stok/bahan', [StokController::class, 'storeBahan']); // Proses simpan dari modal/halaman

    // 3. Fitur Tambah Barang Jadi (Khusus Modal/Popup)
    // Pastikan baris ini ada di dalam group middleware auth
    Route::post('/stok/barang-jadi', [StokController::class, 'storeBarangJadi']);
    // Rute untuk menampilkan form Tambah Barang Jadi
    Route::get('/stok/barang-jadi/create', [StokController::class, 'createBarangJadi']);
    // 4. Fitur Edit & Update Bahan Baku
    Route::get('/stok/{id}/edit', [StokController::class, 'edit']); // Membuka file edit.blade.php
    Route::put('/stok/{id}', [StokController::class, 'update']); // Proses simpan perubahan
    // 5. Fitur Hapus
    Route::delete('/stok/{id}', [StokController::class, 'destroy']);
    // Rute untuk Edit, Update, dan Hapus Barang Jadi
    Route::get('/stok/barang-jadi/{id}/edit', [StokController::class, 'editBarangJadi']);
    Route::put('/stok/barang-jadi/{id}', [StokController::class, 'updateBarangJadi']);
    Route::delete('/stok/barang-jadi/{id}', [StokController::class, 'destroyBarangJadi']);
    // --- MANAJEMEN PESANAN ---
    Route::get('/pesanan', [PesananController::class, 'index']);
    Route::get('/pesanan/create', [PesananController::class, 'create']);
    Route::post('/pesanan', [PesananController::class, 'store']);
    Route::get('/pesanan/{id}/detail', [PesananController::class, 'show']);
    Route::put('/pesanan/{id}/status', [PesananController::class, 'updateStatus']);

    // --- INPUT PROGRES KERJA ---
    Route::get('/progres/create', [ProgresController::class, 'create']);
    Route::post('/progres', [ProgresController::class, 'store']);
    Route::get('/progres', [ProgresController::class, 'index']);
    Route::get('/pesanan/progres/{id_log}/edit', [ProgresController::class, 'edit']);
    Route::put('/pesanan/{id_pesanan}/progres/{id_log}', [ProgresController::class, 'update']);

    // --- MANAJEMEN KEUANGAN & GAJI ---
    Route::get('/keuangan', [KeuanganController::class, 'index']);
    Route::get('/keuangan/create', [KeuanganController::class, 'create']);
    Route::post('/keuangan', [KeuanganController::class, 'store']);
    Route::get('/keuangan/{id}/edit', [KeuanganController::class, 'edit']);
    Route::put('/keuangan/{id}', [KeuanganController::class, 'update']);
    Route::delete('/keuangan/{id}', [KeuanganController::class, 'destroy']);
    Route::get('/keuangan/cetak', [KeuanganController::class, 'cetakLaporan']);

    // Fitur Gaji
    Route::get('/gaji', [KeuanganController::class, 'indexGaji']);
    Route::post('/gaji/bayar/{id_karyawan}', [KeuanganController::class, 'bayarGaji']);
    Route::get('/keuangan/gaji/{id_karyawan}/detail', [KeuanganController::class, 'detailGaji']); // --- MANAJEMEN PESANAN ---
    Route::get('/pesanan', [PesananController::class, 'index']);

    // PASTIKAN JALUR INI MANGGIL FUNGSI 'detail'
    Route::get('/pesanan/{id}/detail', [PesananController::class, 'detail']);

    // RUTE UNTUK EDIT PROGRES (Menggunakan 2 ID)
    Route::get('/pesanan/{id_pesanan}/progres/{id_log}/edit', [PesananController::class, 'editProgres']); // Rute untuk mengubah status pesanan menjadi selesai
    Route::delete('/pesanan/{id_pesanan}/progres/{id_log}', [ProgresController::class, 'destroy']);
    // Rute untuk eksekusi tandai selesai
    Route::post('/pesanan/{id}/selesai', [PesananController::class, 'tandaiSelesai']);
});
