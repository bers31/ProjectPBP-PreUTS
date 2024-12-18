<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Ruang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $Users = User::count();
        $Mahasiswa = Mahasiswa::count();
        $Dosen = Dosen::count();
        $Ruang = Ruang::count();
        return view('admin.dashboard', compact('Users', 'Mahasiswa', 'Dosen', 'Ruang'));
    }
    

    public function createUsersFromLecturersAndStudents()
    {
        // Create user accounts for lecturers
        $lecturers = Dosen::all();
        foreach ($lecturers as $lecturer) {
            $this->createUserAccount($lecturer->email, 'dosen');
        }

        // Create user accounts for students
        $students = Mahasiswa::all();
        foreach ($students as $student) {
            $this->createUserAccount($student->email, 'mahasiswa');
        }

        // Redirect back with a success message
        return redirect()->route('admin.dashboard')->with('success', 'User accounts for lecturers and students have been created.');
    }

    /**
     * Helper function to create a user account
     */
    private function createUserAccount($email, $role)
    {
        // Check if a user with this email already exists
        if (User::where('email', $email)->exists() && User::where('username', Str::before($email, '@'))) {
            return; // Skip creating this user if they already exist
        }

        // Create a new user with default password and role
        User::create([
            'email' => $email,
            'username' => Str::before($email, '@'),
            'password' => Hash::make('12345'), // Default password
            'role' => $role,
        ]);
    }
}
