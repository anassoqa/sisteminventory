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
        Schema::create('tb_pro', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pro');
            $table->string('nama_barang');
            $table->string('jumlah_barang');
            $table->string('departement');
            $table->string('remark');
            $table->string('tanggal');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pro');
    }
};
