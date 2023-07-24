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
            $table->string('nama') ->nullable();
            $table->string('nama_barang');
            $table->string('deskripsi_barang');
            $table->date('tgl_ditemukan');
            $table->string('foto_identitas')->nullable();
            $table->string('foto_barang_found')->nullable();
            $table->date('tgl_claim')->nullable();
            $table->string('nomorhp')->nullable();
            $table->timestamp('created_at')->useCurrent()->timezone('Asia/Jakarta');
            $table->timestamp('updated_at')->useCurrent()->timezone('Asia/Jakarta');
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
