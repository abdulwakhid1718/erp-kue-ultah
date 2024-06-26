<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_pelanggan = [
            [
                'nama_pelanggan' => 'Andre',
                'username' => 'andreansyah',
                'password' => Hash::make('12345678'),
                'email'=> 'andre@gmail.com',
                'nomor_telepon' => '0832232323'
            ],
            [
                'nama_pelanggan' => 'Wakhid',
                'username' => 'wakhid',
                'password' => Hash::make('12345678'),
                'email'=> 'wakhid@gmail.com',
                'nomor_telepon' => '083223232322'
            ]
        ];

        foreach ($data_pelanggan as $item) {
            \App\Models\Pelanggan::create($item);
        }
    }
}
