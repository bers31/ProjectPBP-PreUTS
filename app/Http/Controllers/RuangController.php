<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRuangRequest;
use App\Http\Requests\UpdateRuangRequest;
use App\Models\Departemen;
use App\Models\Ruang;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        $ruang = Ruang::with('departemen')->get();
        return view('admin.ruang.index', compact('ruang'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $fakultas = Fakultas::get(['nama_fakultas','kode_fakultas']);
        $departemen = Departemen::all(); // Get all departemen records
        return view('admin.ruang.create', compact('departemen')); // Pass to the view 
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRuangRequest $request)
    {
        $validated = $request->validated();

        Ruang::create($validated);

        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil dibuat!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruang $ruang)
    {
        // $fakultas = Fakultas::get(['nama_fakultas','kode_fakultas']);
        $departemen = Departemen::all(); // Get all departemen records
        return view('admin.ruang.edit', compact('ruang','departemen')); // Pass to the view 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRuangRequest $request, Ruang $ruang)
    {
        $validated = $request->validated();

        $ruang->update($validated);

        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruang $ruang)
    {
        $ruang->delete();
        return redirect()->route('ruang.index')->with('success', 'Ruang deleted successfully.');
    }
}
