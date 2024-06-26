<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pesanan = [
            [
                'pelanggan_id' => 1,
                'tanggal_pesanan' => '2023-06-01',
                'status_pesanan' => 'pending',
                'harga_total' => 60000,
            ],
            [
                'pelanggan_id' => 1,
                'tanggal_pesanan' => '2023-06-02',
                'status_pesanan' => 'pending',
                'harga_total' => 122000,
            ],
            // Add more entries as needed
        ];

        foreach ($pesanan as $item) {
            \App\Models\Pesanan::create($item);
        }
    }
}
