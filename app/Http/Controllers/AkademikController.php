<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;
use App\Models\Departemen;
use App\Models\Prodi;

class AkademikController extends Controller
{
    /**
     * Menampilkan Dashboard Akademik.
     */
    public function index()
    {
        $ruangs = Ruang::with(['departemen', 'prodi'])->get();
        $prodis = Prodi::all();

        return view('akademik.dashboard', compact('ruangs', 'prodis'));
    }

    /**
     * Mengubah kapasitas dan prodi ruang secara individu.
     */
    public function updateRuang(Request $request)
    {
        $request->validate([
            'ruang' => 'required|string|exists:ruang,kode_ruang',
            'kapasitas' => 'required|array',
            'kapasitas.*' => 'nullable|integer|min:1',
            'prodi' => 'required|array',
            'prodi.*' => 'required|string|exists:prodi,kode_prodi'
        ]);

        $kodeRuang = $request->input('ruang');
        $ruang = Ruang::where('kode_ruang', $kodeRuang)->firstOrFail();
        $kodeProdi = $request->input("prodi.$kodeRuang");
        $prodi = Prodi::where('kode_prodi', $kodeProdi)->firstOrFail();

        // Validasi prodi berdasarkan strata
        if (!$prodi) {
            return redirect()->route('akademik.dashboard')
                ->withErrors(['error' => 'Prodi yang dipilih tidak valid.']);
        }

        // Update ruang
        $ruang->update([
            'kapasitas' => $request->input("kapasitas.$kodeRuang"),
            'kode_prodi' => $kodeProdi,
            'kode_departemen' => $prodi->kode_departemen,
        ]);

        return redirect()->route('akademik.dashboard')
            ->with('success', 'Kapasitas dan prodi ruang berhasil diperbarui.');
    }

    /**
     * Mengubah kapasitas dan prodi untuk semua ruang.
     */
    public function updateAllRuang(Request $request)
    {
        // Debug untuk melihat data yang dikirim
        \Log::info($request->all());
    
        $request->validate([
            'kapasitas' => 'required|array',
            'kapasitas.*' => 'nullable|integer|min:1',
            'prodi' => 'required|array',
            'prodi.*' => 'required|string|exists:prodi,kode_prodi'
        ]);
    
        foreach ($request->kapasitas as $kodeRuang => $kapasitas) {
            $ruang = Ruang::where('kode_ruang', $kodeRuang)->first();
            if ($ruang) {
                $ruang->update([
                    'kapasitas' => $kapasitas,
                    'kode_prodi' => $request->prodi[$kodeRuang]
                ]);
            }
        }
    
        return back()->with('success', 'Semua ruang telah berhasil diperbarui.');
    }
}