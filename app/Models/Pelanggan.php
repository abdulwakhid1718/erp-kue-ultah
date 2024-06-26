<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Import Laravel's Authenticatable
use Illuminate\Notifications\Notifiable;

class Pelanggan extends Authenticatable // Implement Authenticatable
{
    use HasFactory, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $guarded = [
        'id',
        // Tambahkan atribut lain yang ingin Anda masukkan ke sini
    ];

    public function pesanan()
    {
        return $this->hasMany(Pelanggan::class);
    }
}
