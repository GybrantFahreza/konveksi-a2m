<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $table = 'bahan_baku';
    protected $primaryKey = 'id_bahan';
    protected $fillable = ['nama_bahan', 'stok_sekarang', 'satuan', 'batas_kritis'];
}
