<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BahanBakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_bahan_baku = [
            [
                'nama_bahan_baku' => 'Tepung Terigu',
                'deskripsi' => 'Tepung terigu protein sedang untuk membuat roti dan kue',
                'stok' => 50,
                'satuan' => 'kg',
                'foto_bahan_baku'=>'foto_bahan_baku/foto_tepung.jpg'
            ],
            [
                'nama_bahan_baku' => 'Gula Pasir',
                'deskripsi' => 'Gula pasir putih untuk pemanis',
                'stok' => 25,
                'satuan' => 'kg',
                'foto_bahan_baku'=>'foto_bahan_baku/foto gula.jpg'
            ],
            [
                'nama_bahan_baku' => 'Telur',
                'deskripsi' => 'Telur ayam segar',
                'stok' => 100,
                'satuan' => 'butir',
                'foto_bahan_baku'=>'foto_bahan_baku/telur.png'
            ],
            [
                'nama_bahan_baku' => 'Mentega',
                'deskripsi' => 'Mentega asin untuk membuat kue',
                'stok' => 20,
                'satuan' => 'pack',
                'foto_bahan_baku'=>'foto_bahan_baku/mentega.JPG'
            ],
            [
                'nama_bahan_baku' => 'Susu Cair',
                'deskripsi' => 'Susu cair full cream untuk membuat kue',
                'stok' => 10,
                'satuan' => 'liter',
                'foto_bahan_baku'=>'foto_bahan_baku/susucair.jpg'
            ],
        ];

        foreach ($data_bahan_baku as $item) {
            \App\Models\BahanBaku::create($item);
        }
    }
}
