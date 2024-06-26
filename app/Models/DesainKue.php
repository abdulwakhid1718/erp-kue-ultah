<?php

namespace App\Models;

use App\Models\UkuranKue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesainKue extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ukuran_kue()
    {
        return $this->hasMany(UkuranKue::class);
    }

    public function detail_pesanans()
    {
        return $this->hasMany(DetailPesanan::class);
    }
}
