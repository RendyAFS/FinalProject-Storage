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
        Schema::table('losts', function (Blueprint $table) {
            $table->softDeletes('deleted_at')->after('foto_barang_lost');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('losts', function (Blueprint $table) {
            $table->dropSoftDeletes('deleted_at');
        });
    }
};
