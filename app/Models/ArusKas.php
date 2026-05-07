<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArusKas extends Model
{
    protected $table = 'arus_kas';
    protected $primaryKey = 'id_kas';
    protected $fillable = [
        'tanggal_transaksi',
        'kategori',
        'deskripsi',
        'tipe_arus',
        'banyak',            // Baru
        'harga',             // Baru
        'nominal',           // Ini akan jadi kolom 'Total' (Banyak x Harga)
        'status_transaksi'   // Baru
    ];
}
