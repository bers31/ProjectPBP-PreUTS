<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::get(['kode_fakultas','nama_fakultas']);
        return view('admin.mahasiswa.create', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMahasiswaRequest $request)
    {
        $validated = $request->validated();

        Mahasiswa::create($validated);
        User::create([
            'email' => $request->email,
            'password' => Hash::make('12345'),
            'role' => 'mahasiswa',
        ]);
        
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $fakultas = Fakultas::get(['kode_fakultas','nama_fakultas']);
        return view('admin.mahasiswa.edit', compact(['mahasiswa', 'fakultas']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
{
    try {
        // Nonaktifkan foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        $validated = $request->validated();
        
        // Update data mahasiswa
        $mahasiswa->update($validated);

        // Aktifkan kembali foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        return redirect()->route('mahasiswa.index')
                        ->with('success', 'Mahasiswa berhasil diupdate!');
        } 
        catch (\Exception $e) {
        // Pastikan foreign key checks diaktifkan kembali jika terjadi error
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        return back()->withInput()
                    ->withErrors(['error' => 'Terjadi kesalahan saat mengupdate data.']);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }

    public function showIrs()
    {
        // Retrieve jadwal records and order by day and start time
        $jadwals = Jadwal::with('mataKuliah')->orderBy('hari')->orderBy('jam_mulai')->get();

        // Return the view with jadwals data
        return view('mahasiswa.irs_mhs', compact('jadwals'));
    
    }
}
