<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailUkuranPesanan extends Model
{
    protected $table = 'detail_ukuran_pesanan';
    protected $primaryKey = 'id_detail_ukuran';
    protected $fillable = ['id_pesanan', 'ukuran', 'jumlah'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id_pesanan');
    }
}
