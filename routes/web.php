<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Menampilkan halaman login
Route::get('/login', function () {
    return view('login_page');
})->name('login');

// Proses login
Route::post('/login', [LoginController::class, 'login']);

// Dashboard setelah login
Route::get('/dashboard_mahasiswa', function () {
    return view('dashboard_mahasiswa'); // View untuk dashboard mahasiswa
})->middleware('auth'); // Pastikan hanya pengguna yang sudah login bisa akses

Route::get('/dashboard_mahasiswa', function () {
    return view('dashboard_mahasiswa');
});

Route::get('/about', function () {
    return view('about');  // Define the route to the about page
})->name('about');

Route::get('/check-key', function () {
    return env('APP_KEY');
});
