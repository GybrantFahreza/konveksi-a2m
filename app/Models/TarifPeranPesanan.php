<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TarifPeranPesanan extends Model
{
    protected $table = 'tarif_peran_pesanan';
    protected $primaryKey = 'id_tarif_peran';
    protected $fillable = ['id_pesanan', 'peran', 'tarif_per_pcs'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id_pesanan');
    }

    public function logProgres()
    {
        return $this->hasMany(LogProgresHarian::class, 'id_tarif_peran', 'id_tarif_peran');
    }
}
