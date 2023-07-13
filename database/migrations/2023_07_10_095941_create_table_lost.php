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
        Schema::create('losts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nama_barang');
            $table->string('deskripsi_barang');
            $table->string('nomorhp');
            $table->date('tgl_kehilangan');
            $table->string('foto_barang_lost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_lost');
    }
};
