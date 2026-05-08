<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangJadi extends Model
{
    protected $table = 'barang_jadi';
    protected $primaryKey = 'id_barang';
    protected $fillable = [
        'nama_barang',
        'ukuran',
        'stok_sekarang',
        'satuan', // <-- PASTIKAN INI ADA YAA
    ];
}
