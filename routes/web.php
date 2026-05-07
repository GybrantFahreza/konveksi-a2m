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
    Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit']);
    Route::put('/karyawan/{id}', [KaryawanController::class, 'update']);
    Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']);
    Route::post('/absensi', [KaryawanController::class, 'simpanAbsensi']);
    Route::get('/karyawan/{id}/detail', [KaryawanController::class, 'detailLaporan']);

    // --- MANAJEMEN STOK ---
    Route::get('/stok', [StokController::class, 'index']);
    Route::post('/stok/bahan', [StokController::class, 'storeBahan']);
    Route::post('/stok/barang-jadi', [StokController::class, 'storeBarangJadi']);

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
    Route::get('/keuangan/gaji/{id_karyawan}/detail', [KeuanganController::class, 'detailGaji']);
});
