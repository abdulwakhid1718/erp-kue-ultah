<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Import Laravel's Authenticatable
use Illuminate\Notifications\Notifiable;

class Pegawai extends Authenticatable // Implement Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded = ['id'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function gajis()
    {
        return $this->hasMany(Gaji::class);
    }

    public function jamLembur()
    {
        return $this->hasMany(JamLembur::class);
    }

    public function tenaga_kerja_produksi()
    {
        return $this->hasMany(TenagaKerjaProduksi::class);
    }
}
