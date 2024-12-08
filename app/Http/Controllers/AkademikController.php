<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;
use App\Models\Fakultas;

class AkademikController extends Controller
{
    /**
     * Menampilkan Dashboard Akademik.
     */
    public function index()
    {
        $ruangs = Ruang::with('fakultas')->get(); // Mengambil data ruang beserta fakultasnya
        $fakultas = Fakultas::with('departemen.prodi')->get(); // Mengambil semua fakultas dan data prodi terkait

        return view('akademik.dashboard', compact('ruangs', 'fakultas'));
    }

    /**
     * Mengubah kapasitas dan prodi ruang secara individu.
     */
    public function updateRuang(Request $request)
    {
        // Debug untuk melihat data yang dikirim
        \Log::info($request->all());
        
        $request->validate([
            'ruang' => 'required|string|exists:ruang,kode_ruang',
            'kapasitas' => 'required|array',
            'prodi' => 'required|array',
        ]);
    
        $ruang = Ruang::where('kode_ruang', $request->ruang)->firstOrFail();
        
        // Dapatkan kode_prodi dari form
        $kodeProdi = $request->input("prodi.{$request->ruang}");
        
        // Update ruang
        $ruang->update([
            'kapasitas' => $request->input("kapasitas.{$request->ruang}"),
            'kode_prodi' => $kodeProdi
        ]);
    
        return redirect()->route('akademik.dashboard')
            ->with('success', 'Kapasitas dan prodi ruang berhasil diperbarui.');
    }
    
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