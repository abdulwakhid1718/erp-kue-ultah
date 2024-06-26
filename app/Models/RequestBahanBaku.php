<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestBahanBaku extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function detail_bahan_baku()
    {
        return $this->belongsTo(DetailBahanBaku::class);
    }
}
