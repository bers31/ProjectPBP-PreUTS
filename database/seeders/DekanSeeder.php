<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dekan;
use Illuminate\Support\Facades\Hash;

class DekanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Dekan::create([
            'nidn' => '113456789011',
            'nama' => 'Agus Salim',
            'email' => 'agus@lecturers.undip.ac.id',
            'kode_departemen' => '1234'

            // field lainnya
        ]);
    }
}