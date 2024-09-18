<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login_page', function () {
    return view('login_page');
});

Route::get('/dashboard_mahasiswa', function () {
    return view('dashboard_mahasiswa');
});