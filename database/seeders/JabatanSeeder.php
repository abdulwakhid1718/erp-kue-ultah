<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_jabatan = [
            ['id' => 1, 'devisi_id' => 1, 'nama_jabatan' => 'Manager Penjualan'],
            ['id' => 2, 'devisi_id' => 1, 'nama_jabatan' => 'Sales Executive'],
            ['id' => 3, 'devisi_id' => 1, 'nama_jabatan' => 'Sales Coordinator'],
            ['id' => 4, 'devisi_id' => 2, 'nama_jabatan' => 'Manager Pemasaran'],
            ['id' => 5, 'devisi_id' => 2, 'nama_jabatan' => 'Marketing Specialist'],
            ['id' => 6, 'devisi_id' => 2, 'nama_jabatan' => 'Social Media Manager'],
            ['id' => 7, 'devisi_id' => 3, 'nama_jabatan' => 'Chief Financial Officer (CFO)'],
            ['id' => 8, 'devisi_id' => 3, 'nama_jabatan' => 'Accountant'],
            ['id' => 9, 'devisi_id' => 3, 'nama_jabatan' => 'Financial Analyst'],
            ['id' => 10, 'devisi_id' => 4, 'nama_jabatan' => 'HR Manager'],
            ['id' => 11, 'devisi_id' => 4, 'nama_jabatan' => 'Recruitment Specialist'],
            ['id' => 12, 'devisi_id' => 4, 'nama_jabatan' => 'HR Coordinator'],
            ['id' => 13, 'devisi_id' => 5, 'nama_jabatan' => 'Operations Manager'],
            ['id' => 14, 'devisi_id' => 5, 'nama_jabatan' => 'Operations Supervisor'],
            ['id' => 15, 'devisi_id' => 5, 'nama_jabatan' => 'Logistics Coordinator'],
            ['id' => 16, 'devisi_id' => 6, 'nama_jabatan' => 'Owner']
        ];
        
        foreach ($data_jabatan as $item) {
            \App\Models\Jabatan::create($item);
        }
    }
}
