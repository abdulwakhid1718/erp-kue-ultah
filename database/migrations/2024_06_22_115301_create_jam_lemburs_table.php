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
        Schema::create('jam_lemburs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id');
            $table->date('tanggal');
            $table->Integer('jam_lembur');
            $table->Integer('tarif_lembur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jam_lemburs');
    }
};
