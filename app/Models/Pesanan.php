<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan'; // Wajib! Kalau tidak, insert Tarif gagal

    // Pastikan semua kolom ini tertulis!
    protected $fillable = [
        'nama_pesanan',
        'nama_klien',
        'no_hp_klien',
        'tanggal_deadline',
        'target_total_pcs',
        'status_pesanan',
        'target_s',
        'target_m',
        'target_l',
        'target_xl',
        'target_xxl',
        'target_3xl' // Tambahkan ini
    ];

    public function tarifPeran()
    {
        return $this->hasMany(TarifPeranPesanan::class, 'id_pesanan', 'id_pesanan');
    }
}
