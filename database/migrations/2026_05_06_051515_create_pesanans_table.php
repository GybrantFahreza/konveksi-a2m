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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->string('nama_pesanan', 100);
            $table->string('nama_klien', 100);
            $table->string('no_hp_klien', 15)->nullable();
            $table->date('tanggal_deadline');
            $table->integer('target_total_pcs');
            $table->enum('status_pesanan', ['Pengerjaan', 'Selesai', 'Dibatalkan'])->default('Pengerjaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
