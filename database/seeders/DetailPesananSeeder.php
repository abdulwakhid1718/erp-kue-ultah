<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailPesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pesanan = [
            [
                'pesanan_id' => 1,
                'desain_kue_id' => 1,
                'jumlah_kue' => 1,
                'total_harga' => 60000,
            ],
            [
                'pesanan_id' => 2,
                'desain_kue_id' => 2,
                'jumlah_kue' => 1,
                'total_harga' => 62000,
            ],
            [
                'pesanan_id' => 2,
                'desain_kue_id' => 1,
                'jumlah_kue' => 1,
                'total_harga' => 60000,
            ],
            
        ];

        foreach ($pesanan as $item) {
            \App\Models\DetailPesanan::create($item);
        }
    
    }
}
