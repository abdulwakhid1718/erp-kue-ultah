<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DesainKue;

class DesainKueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DesainKue::create([
            'nama_kue' => 'Black Forest',
            'deskripsi' => 'Kue coklat dengan krim dan ceri di atasnya.',
            'gambar' => 'desain_kue/black_forest.jpg',
        ]);

        DesainKue::create([
            'nama_kue' => 'Red Velvet',
            'deskripsi' => 'Kue merah dengan lapisan krim keju.',
            'gambar' => 'desain_kue/red_velvet.jpg',
        ]);

        DesainKue::create([
            'nama_kue' => 'Cheesecake',
            'deskripsi' => 'Kue keju dengan topping buah.',
            'gambar' => 'desain_kue/cheesecake.jpg',
        ]);

        DesainKue::create([
            'nama_kue' => 'Tiramisu',
            'deskripsi' => 'Kue kopi dengan lapisan mascarpone.',
            'gambar' => 'desain_kue/tiramisu.jpeg',
        ]);

        DesainKue::create([
            'nama_kue' => 'Chocolate Cake',
            'deskripsi' => 'Kue coklat dengan ganache coklat.',
            'gambar' => 'desain_kue/chocolate_cake.jpg',
        ]);
    }
}
