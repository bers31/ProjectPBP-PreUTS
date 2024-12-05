<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function jadwalMahasiswa()
     {
        $jadwal = Jadwal::with('mataKuliah')
        ->whereHas('mataKuliah', function ($query) {
            $query->where('status', 'disetujui'); 
        })
        ->orderBy('hari')
        ->orderBy('jam_mulai')
        ->get();    
         return view('mahasiswa.jadwal_mhs', compact('jadwal'));
     }
     
    public function index()
    {
        //
        // Retrieve jadwal records and order by day and start time
        $jadwals = Jadwal::with('mataKuliah')->orderBy('hari')->orderBy('jam_mulai')->get();

        return view('your_view_name', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
