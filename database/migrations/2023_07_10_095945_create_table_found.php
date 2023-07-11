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
        Schema::create('founds', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('deskripsi_barang');
            $table->string('foto_barang');
            $table->date('tgl_ditemukan');

            $table->date('tgl_claim');
            $table->string('nomorhp');
            $table->string('foto_identitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_found');
    }
};