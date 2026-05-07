<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $fillable = ['nama_karyawan', 'no_hp', 'alamat', 'jenis_kelamin', 'status_karyawan'];

    // Relasi: 1 Karyawan punya banyak Absensi
    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_karyawan', 'id_karyawan');
    }

    // Relasi: 1 Karyawan punya banyak Log Progres
    public function logProgres()
    {
        return $this->hasMany(LogProgresHarian::class, 'id_karyawan', 'id_karyawan');
    }
}
