<?php

namespace Database\Seeders;

use App\Models\DetailIRS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class nDetailIrs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $details = [['id_irs' => '1', 'id_jadwal' => '17'],
        ['id_irs' => '1', 'id_jadwal' => '12'],
        ['id_irs' => '1', 'id_jadwal' => '13'],
        ['id_irs' => '1', 'id_jadwal' => '14'],
        ['id_irs' => '1', 'id_jadwal' => '15'],
        ['id_irs' => '1', 'id_jadwal' => '16'],
        ['id_irs' => '1', 'id_jadwal' => '18'],
        ['id_irs' => '1', 'id_jadwal' => '19'],
        ['id_irs' => '2', 'id_jadwal' => '20'],
        ['id_irs' => '2', 'id_jadwal' => '21'],
        ['id_irs' => '2', 'id_jadwal' => '22'],
        ['id_irs' => '2', 'id_jadwal' => '23'],
        ['id_irs' => '2', 'id_jadwal' => '24'],
        ['id_irs' => '2', 'id_jadwal' => '25'],
        ['id_irs' => '2', 'id_jadwal' => '26'],
        ['id_irs' => '2', 'id_jadwal' => '27'],
        ['id_irs' => '3', 'id_jadwal' => '28'],
        ['id_irs' => '3', 'id_jadwal' => '29'],
        ['id_irs' => '3', 'id_jadwal' => '30'],
        ['id_irs' => '3', 'id_jadwal' => '31'],
        ['id_irs' => '3', 'id_jadwal' => '32'],
        ['id_irs' => '3', 'id_jadwal' => '33'],
        ['id_irs' => '3', 'id_jadwal' => '34'],
        ['id_irs' => '4', 'id_jadwal' => '35'],
        ['id_irs' => '4', 'id_jadwal' => '36'],
        ['id_irs' => '4', 'id_jadwal' => '37'],
        ['id_irs' => '4', 'id_jadwal' => '38'],
        ['id_irs' => '4', 'id_jadwal' => '39'],
        ['id_irs' => '4', 'id_jadwal' => '40'],
        ['id_irs' => '4', 'id_jadwal' => '41'],
        ];

        foreach ($details as $detail){
            DetailIRS::create($detail);
        }
    }
}
