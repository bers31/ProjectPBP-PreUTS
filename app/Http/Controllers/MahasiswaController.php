<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Jadwal;
use App\Models\KHS;
use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
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
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus!.');
    }

    public function updateSksIpk(Request $request)
    {
            // Fetch all mahasiswa
        $mahasiswas = Mahasiswa::all();

        foreach ($mahasiswas as $mahasiswa) {
            // Fetch all KHS records for this mahasiswa
            $khsRecords = KHS::where('nim', $mahasiswa->nim)
                ->with('matakuliah')
                ->get();

            // Skip if no KHS records
            if ($khsRecords->isEmpty()) {
                continue;
            }

            // Calculate total values across all semesters
            $totalSks = 0;
            $totalNilaiBobot = 0;

            foreach ($khsRecords as $khs) {
                // Skip if no mata kuliah associated
                if (!$khs->matakuliah) {
                    continue;
                }

                // Grade conversion logic with bobot
                $nilai = $khs->nilai;
                if ($nilai >= 80) {
                    $nilaiBobot = 4.0;
                } elseif ($nilai >= 70) {
                    $nilaiBobot = 3.0;
                } elseif ($nilai >= 60) {
                    $nilaiBobot = 2.0;
                } elseif ($nilai >= 50) {
                    $nilaiBobot = 1.0;
                } else {
                    $nilaiBobot = 0.0;
                }

                // Add SKS to total
                $totalSks += $khs->matakuliah->sks;

                // Calculate weighted grade points
                $bobotNilai = $khs->matakuliah->sks * $nilaiBobot;
                $totalNilaiBobot += $bobotNilai;
            }

            // Calculate IPK
            $ipk = $totalSks > 0 ? round($totalNilaiBobot / $totalSks, 2) : 0;

            // Update Mahasiswa model with IPK and total SKS
            $mahasiswa->update([
                'ipk' => $ipk,
                'sks' => $totalSks
            ]);
        }

        return redirect()->route('mahasiswa.index')->with('success', 'Successfully updated all mahasiswa IPK and SKS');
    }

}
