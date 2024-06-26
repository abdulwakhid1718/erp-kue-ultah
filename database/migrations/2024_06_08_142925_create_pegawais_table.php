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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->foreignId("jabatan_id");
            $table->string("nama_pegawai");
            $table->string("username")->unique();
            $table->string("password");
            $table->string("jenis_kelamin");
            $table->date("tanggal_lahir");
            $table->Integer("gaji_pokok");
            $table->string("alamat");
            $table->string("nomor_telepon");
            $table->date("tanggal_masuk");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
