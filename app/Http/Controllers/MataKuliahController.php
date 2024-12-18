<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Prodi;
use App\Http\Requests\StoreMatKulRequest;
use App\Http\Requests\UpdateMatKulRequest;


class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matkul = MataKuliah::all();
        return view('kaprodi.matkul.index', compact('matkul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $kode_departemen = $user->dosen->kode_departemen ?? null; // Assuming User has a relationship with Dosen
        $prodi = Prodi::where('kode_departemen', $kode_departemen)->get();
    
        return view('kaprodi.matkul.create', compact('prodi', 'kode_departemen'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatKulRequest $request)
    {
        $validated = $request->validated();
        MataKuliah::create($validated);
        
        return redirect()->route('matkul.index')->with('success', 'Matkul berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MataKuliah $matkul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataKuliah $matkul)
    {   
        return view('kaprodi.matkul.edit', compact('matkul'));        
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatKulRequest $request, MataKuliah $matkul)
    {
        // Get the validated data
        // dd($request->all());
        // dd($matkul);
        $validated = $request->validated();
        // Update data mahasiswa
        $matkul->update($validated);



        // $matakuliah =
    
    
        $matkul->update([
            'kode_mk' => $validated['kode_mk'],
            'nama_mk' => $validated['nama_mk'],
            'semester' => $validated['semester'],
            'sks' => $validated['sks'],
            'kurikulum' => $validated['kurikulum'],
            'kode_prodi' => $validated['kode_prodi'],
            'sifat' => $validated['sifat'],
        ]);


        // Save the record - this should update the existing record
        // $matkul->save();
    
        // Redirect back to the index with a success message
        return redirect()->route('matkul.index')
                         ->with('success_update', 'Matakuliah berhasil diupdate!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataKuliah $matkul)
    {
        // Delete the MataKuliah record
        $matkul->delete();
    
        // Redirect back with a success message
        return redirect()->route('matkul.index')
                         ->with('success_delete', 'Matakuliah has been deleted successfully!');
    }
    
}
