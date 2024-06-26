<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_devisi = [
            [
                'nama_devisi' => 'Penjualan',
                'deskripsi' => 'Mengatur bagian penjualan'
            ],
            [
                'nama_devisi' => 'Pemasaran',
                'deskripsi' => 'Mengelola kegiatan pemasaran'
            ],
            [
                'nama_devisi' => 'Keuangan',
                'deskripsi' => 'Mengatur keuangan perusahaan'
            ],
            [
                'nama_devisi' => 'Sumber Daya Manusia',
                'deskripsi' => 'Mengelola sumber daya manusia'
            ],
            [
                'nama_devisi' => 'Operasional',
                'deskripsi' => 'Mengawasi operasional produksi sehari-hari'
            ],
            [
                'nama_devisi' => 'Owner',
                'deskripsi' => 'Mengelola keseluruhan website'
            ]
        ];
        

        foreach ($data_devisi as $item) {
            \App\Models\Devisi::create($item);
        }
    }
}
