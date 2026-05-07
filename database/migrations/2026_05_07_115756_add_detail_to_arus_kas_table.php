<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('arus_kas', function (Blueprint $table) {
            $table->integer('banyak')->default(1)->after('tipe_arus');
            $table->integer('harga')->default(0)->after('banyak');
            $table->string('status_transaksi')->default('Lunas')->after('nominal'); // Lunas / Belum Lunas
        });
    }

    public function down()
    {
        Schema::table('arus_kas', function (Blueprint $table) {
            $table->dropColumn(['banyak', 'harga', 'status_transaksi']);
        });
    }
};
