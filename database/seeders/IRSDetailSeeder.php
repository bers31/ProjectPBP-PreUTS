<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\DetailIRS;

class IRSDetailSeeder extends Seeder
{
    public function run()
    {
        // Membuat data akademik terkait user di atas
        // DetailIRS::create([
        //     'id_irs' => '3',
        //     'id_jadwal' => '2'
        // ]);
        DetailIRS::Create([
            'id_irs' => '2',
            'id_jadwal' => '2'
        ]);

        DetailIRS::Create([
            'id_irs' => '2',
            'id_jadwal' => '4'
        ]);

        DetailIRS::Create([
            'id_irs' => '2',
            'id_jadwal' => '6'
        ]);
        
        DetailIRS::Create([
            'id_irs' => '2',
            'id_jadwal' => '8'
        ]);

        DetailIRS::Create([
            'id_irs' => '2',
            'id_jadwal' => '10'
        ]);

        DetailIRS::Create([
            'id_irs' => '7',
            'id_jadwal' => '1'
        ]);

        DetailIRS::Create([
            'id_irs' => '7',
            'id_jadwal' => '3'
        ]);

        DetailIRS::Create([
            'id_irs' => '7',
            'id_jadwal' => '5'
        ]);

        DetailIRS::Create([
            'id_irs' => '7',
            'id_jadwal' => '7'
        ]);

        DetailIRS::Create([
            'id_irs' => '7',
            'id_jadwal' => '9'
        ]);

        DetailIRS::Create([
            'id_irs' => '25',
            'id_jadwal' => '2'
        ]);

        DetailIRS::Create([
            'id_irs' => '25',
            'id_jadwal' => '4'
        ]);

        DetailIRS::Create([
            'id_irs' => '25',
            'id_jadwal' => '6'
        ]);

        DetailIRS::Create([
            'id_irs' => '25',
            'id_jadwal' => '8'
        ]);

        DetailIRS::Create([
            'id_irs' => '25',
            'id_jadwal' => '10'
        ]);

        DetailIRS::Create([
            'id_irs' => '5',
            'id_jadwal' => '1'
        ]);

        DetailIRS::Create([
            'id_irs' => '5',
            'id_jadwal' => '3'
        ]);

        DetailIRS::Create([
            'id_irs' => '5',
            'id_jadwal' => '5'
        ]);

        DetailIRS::Create([
            'id_irs' => '5',
            'id_jadwal' => '7'
        ]);

        DetailIRS::Create([
            'id_irs' => '5',
            'id_jadwal' => '9'
        ]);

        DetailIRS::Create([
            'id_irs' => '220',
            'id_jadwal' => '2'
        ]);

        DetailIRS::Create([
            'id_irs' => '220',
            'id_jadwal' => '4'
        ]);

        DetailIRS::Create([
            'id_irs' => '220',
            'id_jadwal' => '6'
        ]);

        DetailIRS::Create([
            'id_irs' => '220',
            'id_jadwal' => '8'
        ]);

        DetailIRS::Create([
            'id_irs' => '220',
            'id_jadwal' => '10'
        ]);

        DetailIRS::Create([
            'id_irs' => '252',
            'id_jadwal' => '1'
        ]);

        DetailIRS::Create([
            'id_irs' => '252',
            'id_jadwal' => '3'
        ]);

        DetailIRS::Create([
            'id_irs' => '252',
            'id_jadwal' => '5'
        ]);

        DetailIRS::Create([
            'id_irs' => '252',
            'id_jadwal' => '7'
        ]);

        DetailIRS::Create([
            'id_irs' => '252',
            'id_jadwal' => '9'
        ]);
    }
}