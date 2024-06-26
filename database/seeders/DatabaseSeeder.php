<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UkuranKue;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            SupplierSeeder::class,
            BahanBakuSeeder::class,
            DevisiSeeder::class,
            JabatanSeeder::class,
            DetailBahanBakuSeeder::class,
            PelangganSeeder::class,
            PegawaiSeeder::class,
            DesainKueSeeder::class,
            PesananSeeder::class,
            DetailPesananSeeder::class,
        ]);

        $ukurankue = [
            [
                'desain_kue_id' => 1,
                'ukuran' => '20cm',
                'harga' => 60000,
            ],
            [
                'desain_kue_id' => 1,
                'ukuran' => '30cm',
                'harga' => 70000,
            ],
            [
                'desain_kue_id' => 1,
                'ukuran' => '40cm',
                'harga' => 80000,
            ],
            [
                'desain_kue_id' => 2,
                'ukuran' => '20cm',
                'harga' => 62000,
            ],
            [
                'desain_kue_id' => 2,
                'ukuran' => '30cm',
                'harga' => 72000,
            ],
            [
                'desain_kue_id' => 2,
                'ukuran' => '40cm',
                'harga' => 82000,
            ],
            [
                'desain_kue_id' => 3,
                'ukuran' => '20cm',
                'harga' => 63000,
            ],
            [
                'desain_kue_id' => 3,
                'ukuran' => '30cm',
                'harga' => 73000,
            ],
            [
                'desain_kue_id' => 3,
                'ukuran' => '40cm',
                'harga' => 83000,
            ],
            [
                'desain_kue_id' => 4,
                'ukuran' => '20cm',
                'harga' => 64000,
            ],
            [
                'desain_kue_id' => 4,
                'ukuran' => '30cm',
                'harga' => 74000,
            ],
            [
                'desain_kue_id' => 4,
                'ukuran' => '40cm',
                'harga' => 84000,
            ],
            [
                'desain_kue_id' => 5,
                'ukuran' => '20cm',
                'harga' => 65000,
            ],
            [
                'desain_kue_id' => 5,
                'ukuran' => '30cm',
                'harga' => 75000,
            ],
            [
                'desain_kue_id' => 5,
                'ukuran' => '40cm',
                'harga' => 85000,
            ],
        ];

        foreach ($ukurankue as $item) {
            UkuranKue::create($item);
        }
        
    }
}
