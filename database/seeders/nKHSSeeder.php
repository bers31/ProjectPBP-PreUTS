<?php

namespace Database\Seeders;

use App\Models\KHS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class nKHSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $khs = [['nim' => '24060122130084', 'kode_mk' => 'PAIK6102', 'semester' => '1', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'UUW00005', 'semester' => '1', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6103', 'semester' => '1', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6104', 'semester' => '1', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'UUW00007', 'semester' => '1', 'nilai' => '79'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6101', 'semester' => '1', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6105', 'semester' => '1', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'UUW00003', 'semester' => '1', 'nilai' => '79'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6202', 'semester' => '2', 'nilai' => '79'],
        ['nim' => '24060122130084', 'kode_mk' => 'UUW00006', 'semester' => '2', 'nilai' => '79'],
        ['nim' => '24060122130084', 'kode_mk' => 'UUW00004', 'semester' => '2', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6204', 'semester' => '2', 'nilai' => '79'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6603', 'semester' => '2', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6203', 'semester' => '2', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'UUW00011', 'semester' => '2', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6201', 'semester' => '2', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6301', 'semester' => '3', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6302', 'semester' => '3', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6303', 'semester' => '3', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6304', 'semester' => '3', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6305', 'semester' => '3', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6306', 'semester' => '3', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'UUW00008', 'semester' => '3', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6404', 'semester' => '4', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6401', 'semester' => '4', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6406', 'semester' => '4', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6601', 'semester' => '4', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6403', 'semester' => '4', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6405', 'semester' => '4', 'nilai' => '81'],
        ['nim' => '24060122130084', 'kode_mk' => 'PAIK6402', 'semester' => '4', 'nilai' => '81'],
        ];

        foreach ($khs as $nilai ) {
            KHS::create($nilai);
        }
    }
}
