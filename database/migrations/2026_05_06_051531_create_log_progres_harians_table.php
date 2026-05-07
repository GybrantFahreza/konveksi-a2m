<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('log_progres_harian', function (Blueprint $table) {
            $table->id('id_log');

            $table->unsignedBigInteger('id_karyawan');
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan')->onDelete('cascade');

            $table->unsignedBigInteger('id_tarif_peran');
            $table->foreign('id_tarif_peran')->references('id_tarif_peran')->on('tarif_peran_pesanan')->onDelete('cascade');

            $table->date('tanggal_input');
            $table->integer('jumlah_selesai_hari_ini');
            $table->enum('status_penggajian', ['Belum Dibayar', 'Sudah Dibayar'])->default('Belum Dibayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_progres_harians');
    }
};
