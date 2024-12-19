<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use App\Models\Departemen;
use App\Models\PendingRoomChange;
use App\Http\Requests\StoreRuangRequest;
use App\Http\Requests\UpdateRuangRequest;
use Illuminate\Support\Facades\Auth;

class RuangController extends Controller
{
    public function index()
    {
        $ruang = Ruang::get();
        $pendingChanges = PendingRoomChange::where('approval_status', 'pending')->get();
        return view('akademik.ruang.index', compact('ruang', 'pendingChanges'));
    }

    public function create()
    {
        $departemen = Departemen::all();
        return view('akademik.ruang.create', compact('departemen'));
    }

    public function store(StoreRuangRequest $request)
    {
        $validated = $request->validated();
        
        // Set default status_ketersediaan if not provided
        $validated['status_ketersediaan'] = $validated['status_ketersediaan'] ?? 'Tersedia';

        PendingRoomChange::create([
            'action_type' => 'create',
            'kode_ruang' => $validated['kode_ruang'],
            'kode_departemen' => $validated['kode_departemen'],
            'kode_prodi' => $validated['kode_prodi'] ?? null,
            'kapasitas' => $validated['kapasitas'],
            'status_ketersediaan' => $validated['status_ketersediaan'],
            'new_data' => json_encode($validated),
            'created_by' => Auth::id()
        ]);

        return redirect()->route('ruang.index')
            ->with('success', 'Permintaan pembuatan ruang telah dikirim ke Dekan untuk persetujuan.');
    }

    public function edit(Ruang $ruang)
    {
        $departemen = Departemen::all();
        return view('akademik.ruang.edit', compact('ruang', 'departemen'));
    }

    public function update(UpdateRuangRequest $request, Ruang $ruang)
    {
        $validated = $request->validated();

        PendingRoomChange::create([
            'action_type' => 'update',
            'kode_ruang' => $ruang->kode_ruang,
            'kode_departemen' => $validated['kode_departemen'],
            'kode_prodi' => $validated['kode_prodi'] ?? null,
            'kapasitas' => $validated['kapasitas'],
            'status_ketersediaan' => $validated['status_ketersediaan'] ?? $ruang->status_ketersediaan,
            'old_data' => json_encode($ruang->toArray()),
            'new_data' => json_encode($validated),
            'created_by' => Auth::id()
        ]);

        return redirect()->route('ruang.index')
            ->with('success', 'Permintaan perubahan ruang telah dikirim ke Dekan untuk persetujuan.');
    }

    public function destroy(Ruang $ruang)
    {
        PendingRoomChange::create([
            'action_type' => 'delete',
            'kode_ruang' => $ruang->kode_ruang,
            'kode_departemen' => $ruang->kode_departemen,
            'kode_prodi' => $ruang->kode_prodi,
            'kapasitas' => $ruang->kapasitas,
            'status_ketersediaan' => $ruang->status_ketersediaan,
            'old_data' => json_encode($ruang->toArray()),
            'created_by' => Auth::id()
        ]);

        return redirect()->route('ruang.index')
            ->with('success', 'Permintaan penghapusan ruang telah dikirim ke Dekan untuk persetujuan.');
    }
}