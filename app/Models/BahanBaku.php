<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        // Tambahkan atribut lain yang ingin Anda masukkan ke sini
    ];

    public function detailBahanBakus()
    {
        return $this->hasMany(DetailBahanBaku::class);
    }

    public function detail_produksi_pesanan()
    {
        return $this->hasMany(DetailProduksiPesanan::class);
    }
}
