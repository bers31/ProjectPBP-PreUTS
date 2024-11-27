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
        DetailIRS::create([
            'id_irs' => '3',
            'id_jadwal' => '2'
            // 'nip' => '1114291310',
            // 'kode_fakultas' => 'FSM',
            // 'email' => 'akademik@example.com',
            // 'created_at' => now(),
        ]);
    }
}