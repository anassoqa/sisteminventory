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
        Schema::create('tb_pos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->id_po();
            $table->id_pro();
            $table->nomor_po();
            $table->nama_barang();
            $table->jumlah_barang();
            $table->satuan();
            $table->harga();
            $table->tanggal();
            $table->nama_supplier();
            $table->status();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pos');
    }
};
