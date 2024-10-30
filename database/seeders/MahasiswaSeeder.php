<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Mahasiswa::create([
            'nama' => 'Nama Mahasiswa',
            'nim' => '12345',
            'email' => 'mahasiswa@example.com',
            'departemen' => 'informatika',
            'fakultas' => 'sains dan matematika',
            'nip_doswal' => '121212'
            // field lainnya
        ]);
    }
}
