<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogProgresHarian extends Model
{
    protected $table = 'log_progres_harian';
    protected $primaryKey = 'id_log';
    protected $fillable = [
        'id_karyawan',
        'id_tarif_peran',
        'tanggal_input',
        'jumlah_selesai_hari_ini',
        'ukuran_s',
        'ukuran_m',
        'ukuran_l',
        'ukuran_xl',
        'ukuran_xxl',
        'ukuran_3xl', // Tambahan Baru
        'status_penggajian'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function tarifPeran()
    {
        return $this->belongsTo(TarifPeranPesanan::class, 'id_tarif_peran', 'id_tarif_peran');
    }
}
