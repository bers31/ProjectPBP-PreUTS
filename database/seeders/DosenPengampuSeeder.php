<?php

namespace Database\Seeders;

use App\Models\DosenPengampu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenPengampuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DosenPengampu::create([
            'nidn_dosen' => '123456789011',
            'id_jadwal' => 1,
        ]);
        DosenPengampu::create([
            'nidn_dosen' => '123456789011',
            'id_jadwal' => 2,
        ]);
        DosenPengampu::create([
            'nidn_dosen' => '123456789011',
            'id_jadwal' => 3,
        ]);
        DosenPengampu::create([
            'nidn_dosen' => '123456789011',
            'id_jadwal' => 4,
        ]);
        DosenPengampu::create([
            'nidn_dosen' => '123456789011',
            'id_jadwal' => 5,
        ]);
        DosenPengampu::create([
            'nidn_dosen' => '123456789011',
            'id_jadwal' => 6,
        ]);
        DosenPengampu::create([
            'nidn_dosen' => '123456789011',
            'id_jadwal' => 7,
        ]);
        DosenPengampu::create([
            'nidn_dosen' => '123456789011',
            'id_jadwal' => 8,
        ]);
        DosenPengampu::create([
            'nidn_dosen' => '123456789011',
            'id_jadwal' => 9,
        ]);
        DosenPengampu::create([
            'nidn_dosen' => '123456789011',
            'id_jadwal' => 10,
        ]);
    }
}