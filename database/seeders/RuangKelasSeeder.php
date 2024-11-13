<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RuangKelas;

class RuangKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RuangKelas::create([
            'nama' => 'A101',
            'kapasitas' => 30,
            'status_ketersediaan' => 'Tersedia'
        ]);

        RuangKelas::create([
            'nama' => 'B201',
            'kapasitas' => 25,
            'status_ketersediaan' => 'Penuh'
        ]);

        RuangKelas::create([
            'nama' => 'C301',
            'kapasitas' => 20,
            'status_ketersediaan' => 'Tersedia'
        ]);
    }
}
