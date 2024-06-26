<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailBahanBakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detailbahanbaku = [
            // tepung
            [
                'bahan_baku_id' => 1,
                'supplier_id' => 1,
                'harga' => 12000,
            ],
            [
                'bahan_baku_id' => 1,
                'supplier_id' => 2,
                'harga' => 13000,
            ],
            [
                'bahan_baku_id' => 1,
                'supplier_id' => 3,
                'harga' => 12500,
            ],
             // gula
            [
                'bahan_baku_id' => 2,
                'supplier_id' => 4,
                'harga' => 16000,
            ],
            [
                'bahan_baku_id' => 2,
                'supplier_id' => 5,
                'harga' => 15000,
            ],
            //mentega
            [
                'bahan_baku_id' => 4,
                'supplier_id' => 3,
                'harga' => 5000,
            ],
            [
                'bahan_baku_id' => 4,
                'supplier_id' => 4,
                'harga' => 5000,
            ],
            [
                'bahan_baku_id' => 4,
                'supplier_id' => 2,
                'harga' => 4000,
            ],
            // susu
            [
                'bahan_baku_id' => 5,
                'supplier_id' => 1,
                'harga' => 8000,
            ],
            [
                'bahan_baku_id' => 5,
                'supplier_id' => 2,
                'harga' => 8400,
            ],
            [
                'bahan_baku_id' => 5,
                'supplier_id' => 3,
                'harga' => 8100,
            ],
            [
                'bahan_baku_id' => 5,
                'supplier_id' => 4,
                'harga' => 7800,
            ],
            [
                'bahan_baku_id' => 5,
                'supplier_id' => 5,
                'harga' => 8200,
            ],
            //telur
            [
                'bahan_baku_id' => 3,
                'supplier_id' => 7,
                'harga' => 2000,
            ],
            [
                'bahan_baku_id' => 3,
                'supplier_id' => 6,
                'harga' => 1900,
            ],
            [
                'bahan_baku_id' => 3,
                'supplier_id' => 8,
                'harga' => 2100,
            ],
        ];

        foreach ($detailbahanbaku as $item) {
            \App\Models\DetailBahanBaku::create($item);
        }
    }
}
