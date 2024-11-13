<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ruang')->insert([
            [
                'kode_ruang' => 'A102',
                'kode_departemen' => 'BIO',
            ],
            [
                'kode_ruang' => 'E101',
                'kode_departemen' => 'IF',
            ],
            [
                'kode_ruang' => 'E102',
                'kode_departemen' => 'IF',
            ],
        ]);
    }
}
