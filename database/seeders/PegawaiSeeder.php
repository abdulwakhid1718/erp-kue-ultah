<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Hash;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pegawai::create([
            'jabatan_id' => 10, // Pastikan jabatan_id sesuai dengan data di tabel jabatans
            'nama_pegawai' => 'Hesti',
            'username' => 'hesti',
            'password' => Hash::make('password123'),
            'jenis_kelamin' => 'Perempuan',
            'tanggal_lahir' => '1985-04-10',
            'gaji_pokok' => 5000000,
            'alamat' => 'Jl. Merdeka No.1, Jakarta',
            'nomor_telepon' => '081234567890',
            'tanggal_masuk' => '2020-01-01',
        ]);

        Pegawai::create([
            'jabatan_id' => 16, // Pastikan jabatan_id sesuai dengan data di tabel jabatans
            'nama_pegawai' => 'Azrel',
            'username' => 'azrel',
            'password' => Hash::make('password123'),
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => '1990-08-15',
            'gaji_pokok' => 3000000,
            'alamat' => 'Jl. Kebon Jeruk No.2, Bandung',
            'nomor_telepon' => '081298765432',
            'tanggal_masuk' => '2019-03-15',
        ]);

        Pegawai::create([
            'jabatan_id' => 13, // Pastikan jabatan_id sesuai dengan data di tabel jabatans
            'nama_pegawai' => 'Dina',
            'username' => 'dina',
            'password' => Hash::make('password123'),
            'jenis_kelamin' => 'Perempuan',
            'tanggal_lahir' => '1992-12-20',
            'gaji_pokok' => 4000000,
            'alamat' => 'Jl. Melati No.3, Surabaya',
            'nomor_telepon' => '081276543210',
            'tanggal_masuk' => '2021-07-01',
        ]);

        // Tambahkan data pegawai lainnya sesuai kebutuhan
    }
}
