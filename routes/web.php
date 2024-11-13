<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DekanController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaliDropdownController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\RuangController;
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
    Route::pattern('dashboard', 'dashboard|');

    // Student dashboard route (requires 'mahasiswa' role)
    Route::get('/mahasiswa/{dashboard?}', function(){
        return view('mahasiswa.dashboard');
    })->name('mahasiswa.dashboard')
    ->middleware('role:mahasiswa'); 

    Route::get('dosen/{dashboard?}', function() {
        return view('dosen.dashboard');
    })->name('dosen.dashboard')
      ->middleware('role:dosen'); // Check for 'dosen' role

    Route::middleware(['auth', 'role:dekan'])->group(function () {
        Route::get('/dekan/dashboard', [DekanController::class, 'index'])->name('dekan.dashboard');
        Route::post('/dekan/set-jadwal', [DekanController::class, 'setJadwal'])->name('dekan.setJadwal');
        Route::post('/dekan/set-ruang', [DekanController::class, 'setRuang'])->name('dekan.setRuang');
    }); // Check for 'dekan' role

    // Student status_akademik route
    Route::get('mahasiswa/status_akademik', function(){
        return view('mahasiswa.status_akademik');
    })->name('mahasiswa.status_akademik')
    ->middleware('role:mahasiswa');

    Route::get('mahasiswa/registrasi_mhs', function(){
        return view('mahasiswa.registrasi_mhs');
    })->name('mahasiswa.registrasi_mhs')
    ->middleware('role:mahasiswa');

    Route::get('mahasiswa/irs_mhs', function(){
        return view('mahasiswa.irs_mhs');
    })->name('mahasiswa.irs_mhs')
    ->middleware('role:mahasiswa');

    Route::get('mahasiswa/khs_mhs', function(){
        return view('mahasiswa.khs_mhs');
    })->name('mahasiswa.khs_mhs')
    ->middleware('role:mahasiswa');

    Route::get('mahasiswa/transkrip_mhs', function(){
        return view('mahasiswa.transkrip_mhs');
    })->name('mahasiswa.transkrip_mhs')
    ->middleware('role:mahasiswa');

    Route::get('/admin', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard')
    ->middleware('role:admin');  // Check for 'admin' role
});

Route::middleware(['auth','role:dosen'])->group(function(){
    // Lecturer dashboard route (requires 'dosen' role)

    Route::get('/dosen/perwalian', function(){
        return view('dosen.perwalian/index');
    })->name('dosen.perwalian')
    ->middleware('role:dosen');

    Route::get('/dosen/input_nilai', function(){
        return view('dosen.input_nilai');
    })->name('dosen.input_nilai')
    ->middleware('role:dosen');

    
});

Route::post('/api/fetch-tahun', [WaliDropdownController::class, 'fetchTahun'])->name('fetch.tahun');
Route::post('/api/fetch-mahasiswa', [WaliDropdownController::class, 'fetchMahasiswa']);
Route::post('/api/fetch-departemen', [DepartemenController::class, 'fetchDepartemen']);
Route::post('/api/fetch-prodi', [ProdiController::class, 'fetchProdi']);
Route::post('/api/fetch-doswal', [WaliDropdownController::class, 'fetchDoswal']);


// // Admin-specific routes with authentication and 'admin' middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/admin/users', UserController::class)->name('index','users.index')
                                                        ->name('edit','users.edit')
                                                        ->name('create','users.create')
                                                        ->name('update','users.update'); // CRUD routes for users

    Route::resource('/admin/mahasiswa', MahasiswaController::class)->name('index','mahasiswa.index')
                                                        ->name('edit','mahasiswa.edit')
                                                        ->name('create','mahasiswa.create')
                                                        ->name('update','mahasiswa.update'); // CRUD routes for users

    Route::resource('/admin/dosen', DosenController::class)->name('index','dosen.index')
                                                        ->name('edit','dosen.edit')
                                                        ->name('create','dosen.create')
                                                        ->name('update','dosen.update'); // CRUD routes for users

    Route::resource('/admin/ruang', RuangController::class)->name('index','ruang.index')
                                                        ->name('edit','ruang.edit')
                                                        ->name('create','ruang.create')
                                                        ->name('update','ruang.update'); // CRUD routes for ruang

    Route::post('/admin/create-users', [AdminController::class, 'createUsersFromLecturersAndStudents'])->name('admin.createUsers');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

});

// Menampilkan history registrasi pada page registrasi_mhs
Route::post('/get-registrasi-data', [RegistrasiController::class, 'getRegistrasiData'])->name('getRegistrasiData');
Route::get('/mahassiwa/registrasi_mhs', [RegistrasiController::class, 'index'])->name('mahasiswa.registrasi_mhs');


Route::get('/mahasiswa/irs_mhs', [MahasiswaController::class, 'showIrs'])->name('mahasiswa.irs_mhs');
