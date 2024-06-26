<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UkuranKue extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function desain_kue()
    {
        return $this->belongsTo(DesainKue::class);
    }
}
