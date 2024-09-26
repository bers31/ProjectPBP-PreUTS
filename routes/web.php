<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login_page');
})->name('login');

Route::get('/dashboard_mahasiswa', function () {
    return view('dashboard_mahasiswa');
});

Route::get('/about', function () {
    return view('about');  // Define the route to the about page
})->name('about');

Route::get('/check-key', function () {
    return env('APP_KEY');
});
