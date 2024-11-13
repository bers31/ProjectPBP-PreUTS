<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mata_kuliah')->insert([
            [
                'kode_mk' => 'MK001',
                'nama_mk' => 'Basis Data',
                'semester' => 1,
                'sks' => 3,
                'kurikulum' => '2024',
                'sifat' => 'wajib_univ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_mk' => 'MK002',
                'nama_mk' => 'Algoritma dan Pemrograman',
                'semester' => 1,
                'sks' => 4,
                'kurikulum' => '2024',
                'sifat' => 'wajib_prodi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_mk' => 'MK003',
                'nama_mk' => 'Struktur Diskrit',
                'semester' => 2,
                'sks' => 3,
                'kurikulum' => '2024',
                'sifat' => 'wajib_prodi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_mk' => 'MK004',
                'nama_mk' => 'Jaringan Komputer',
                'semester' => 3,
                'sks' => 3,
                'kurikulum' => '2024',
                'sifat' => 'peminatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_mk' => 'MK005',
                'nama_mk' => 'Sistem Cerdas',
                'semester' => 5,
                'sks' => 3,
                'kurikulum' => '2024',
                'sifat' => 'peminatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
