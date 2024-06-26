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
        Schema::create('request_bahan_bakus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_bahan_baku_id');
            $table->integer('jumlah');
            $table->date('tanggal_permintaan');
            $table->Integer('total_harga');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_bahan_bakus');
    }
};
