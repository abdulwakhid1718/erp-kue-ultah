<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduksiPesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function produksi_pesanan()
    {
        return $this->belongsTo(ProduksiPesanan::class);
    }

    public function bahan_baku()
    {
        return $this->belongsTo(BahanBaku::class);
    }
}
