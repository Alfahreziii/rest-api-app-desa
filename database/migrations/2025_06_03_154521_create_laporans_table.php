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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_rumah');
            $table->integer('jumlah_kk');
            $table->integer('jumlah_laki');
            $table->integer('jumlah_perempuan');
            $table->integer('jumlah_meninggal');
            $table->integer('jumlah_lahir');
            $table->integer('jumlah_pindah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
