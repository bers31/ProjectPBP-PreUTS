<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            FDSSeeder::class,
            DosenSeeder::class,
            MahasiswaSeeder::class,
            DekanSeeder::class,
            MKSeeder::class,
            RuangSeeder::class,
            // JadwalSeeder::class,
        ]);
    }
}