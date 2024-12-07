<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Akademik;
use App\Models\User;

class adminSeeder extends Seeder
{
    public function run()
    {
        // Membuat data akademik terkait user di atas
        User::create([
            'email' => 'admin@example.com',
            'password' => '12345', // Admin password
            'role' => 'admin', // Assign the admin role
        ]);
    }
}