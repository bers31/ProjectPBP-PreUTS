<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Proses login
Route::post('/login', [LoginController::class, 'login']);

// About Page Route
Route::get('/about', function () {
    return view('about');
})->name('about');

// Check App Key Route (just for development purposes)
Route::get('/check-key', function () {
    return env('APP_KEY');
});

Route::get('/logout', function () {
    return view('logout');
})->name('logout');
// Logout Route
Route::post('/logout', [LoginController::class, 'logout']);

// // Group routes that require authentication
Route::middleware(['auth'])->group(function () {

    // Student dashboard route (requires 'mahasiswa' role)
    Route::get('/mahasiswa/dashboard', function(){
        return view('mahasiswa.dashboard');
    })->name('mahasiswa.dashboard')
    ->middleware('role:mahasiswa');  // Check for 'mahasiswa' role

    // Lecturer dashboard route (requires 'dosen' role)
    Route::get('/dosen/dashboard', function(){
        return view('dosen.dashboard');
    })->name('dosen.dashboard')
    ->middleware('role:dosen');  // Check for 'dosen' role

    Route::get('/admin/dashboard', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard')
    ->middleware('role:admin');  // Check for 'admin' role
});
    
    // // Admin-specific routes with authentication and 'admin' middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/admin/users', UserController::class)->name('index','users.index')
                                                        ->name('edit','users.edit')
                                                        ->name('create','users.create'); // CRUD routes for users
});