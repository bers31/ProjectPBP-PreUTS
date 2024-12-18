<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Akademik;

class AkademikSeeder extends Seeder
{
    public function run()
    {
        // Membuat data akademik terkait user di atas
        Akademik::create([
            'nip' => '1114291310',
            'kode_fakultas' => 'FSM',
            'email' => 'akademik@example.com',
            'created_at' => now(),
        ]);
    }
}
