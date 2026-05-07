<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('log_progres_harian', function (Blueprint $table) {
            // Menambahkan kolom ukuran setelah jumlah_selesai_hari_ini
            $table->integer('ukuran_s')->default(0)->after('jumlah_selesai_hari_ini');
            $table->integer('ukuran_m')->default(0)->after('ukuran_s');
            $table->integer('ukuran_l')->default(0)->after('ukuran_m');
            $table->integer('ukuran_xl')->default(0)->after('ukuran_l');
            $table->integer('ukuran_xxl')->default(0)->after('ukuran_xl');
            $table->integer('ukuran_3xl')->default(0)->after('ukuran_xxl');
        });
    }

    public function down()
    {
        Schema::table('log_progres_harian', function (Blueprint $table) {
            $table->dropColumn(['ukuran_s', 'ukuran_m', 'ukuran_l', 'ukuran_xl', 'ukuran_xxl', 'ukuran_3xl']);
        });
    }
};
