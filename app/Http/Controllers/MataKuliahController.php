<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

        return view('kaprodi.matkul.create');
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
    public function show(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataKuliah $matkul)
    {   
        // dd($matakuliah);
        // $mataKuliah = MataKuliah::where('kode_mk', $matakuliah)->first();
        return view('kaprodi.matkul.edit', compact('matkul'));        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatKulRequest $request, MataKuliah $matkul)
    {
        $validated = $request->validated();
        // Update data mahasiswa
        $matkul->update($validated);

        // Aktifkan kembali foreign key checks
        return redirect()->route('matkul.index')
                        ->with('success', 'Matakuliah berhasil diupdate!');
        } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataKuliah $mataKuliah)
    {
        //
    }
}
