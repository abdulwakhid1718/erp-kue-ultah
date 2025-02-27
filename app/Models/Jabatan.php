<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function devisi()
    {
        return $this->belongsTo(Devisi::class);
    }
    
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class);
    }
}
