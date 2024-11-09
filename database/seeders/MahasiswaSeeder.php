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
            'nama' => 'gibran',
            'nim' => '24060122130001',
            'email' => 'gibran@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'doswal' => '123456789011'
            // field lainnya
        ]);
    }
}
