<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Dosen::create([
            'nidn' => '123456789011',
            'nama' => 'Bambang Sudayana',
            'email' => 'bambang@lecturers.undip.ac.id',
            'kode_departemen' => '1234'

            // field lainnya
        ]);
    }
}
