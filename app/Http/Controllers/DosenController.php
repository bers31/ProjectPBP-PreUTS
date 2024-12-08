<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDosenRequest;
use App\Http\Requests\UpdateDosenRequest;
use App\Models\Fakultas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dosen = Dosen::all();
        return view('admin.dosen.index', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $fakultas = Fakultas::get(['nama_fakultas','kode_fakultas']);
        return view('admin.dosen.create', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDosenRequest $request)
    {
        $validated = $request->validated();

        Dosen::create($validated);
        User::create([
            'email' => $request->email,
            'password' => Hash::make('12345'),
            'role' => 'dosen',
        ]);
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        return view('admin.dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDosenRequest $request, Dosen $dosen)
    {
        $validated = $request->validated();

        $dosen->update($validated);

        return redirect()->route('dosen.index')->with('success_update', 'Dosen berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success_delete', 'Dosen deleted successfully.');
    }
}
