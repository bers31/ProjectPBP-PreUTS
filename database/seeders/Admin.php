<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Create a default admin user
        User::create([
            'email' => 'admin@example.com',
            'password' => '12345', // Admin password
            'role' => 'admin', // Assign the admin role
        ]);
        User::create([
            'email' => 'dosen@example.com',
            'password' => '12345', // Admin password
            'role' => 'dosen', // Assign the admin role
        ]);
        User::create([
            'email' => 'mahasiswa@example.com',
            'password' => '12345', // Admin password
            'role' => 'mahasiswa', // Assign the admin role
        ]);
        
    }
}

