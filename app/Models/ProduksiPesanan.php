<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduksiPesanan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function tenaga_kerja_produksi()
    {
        return $this->hasMany(TenagaKerjaProduksi::class);
    }

    public function detail_produksi()
    {
        return $this->hasMany(DetailProduksi::class);
    }
}
