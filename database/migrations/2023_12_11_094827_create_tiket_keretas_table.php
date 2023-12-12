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
        Schema::create('tiket_keretas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kereta', 255);
            $table->string('jenis_kereta', 255);
            $table->string('destinasi', 255);
            $table->string('estimasi_waktu', 255);
            $table->string('harga', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiket_keretas');
    }
};
