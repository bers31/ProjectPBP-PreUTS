<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruang;
use App\Models\Prodi;

class AkademikController extends Controller
{
    /**
     * Menampilkan Dashboard Akademik.
     */
    public function index(Request $request)
    {
        $selectedProdi = $request->input('prodi');
    
        // Ambil data prodi untuk dropdown
        $prodis = Prodi::all();
    
        // Ambil ruang berdasarkan prodi yang dipilih
        $ruangs = Ruang::when($selectedProdi, function ($query, $selectedProdi) {
            return $query->whereHas('jadwal', function ($query) use ($selectedProdi) {
                $query->whereHas('mataKuliah', function ($query) use ($selectedProdi) {
                    $query->where('kode_prodi', $selectedProdi);
                });
            });
        })->get();
    
        return view('akademik.dashboard', compact('ruangs', 'prodis'));
    }

    /**
     * Mengubah status ketersediaan ruang kelas.
     */
    public function setRuang(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode' => 'required|string|exists:ruang,kode_ruang',
            'status_ketersediaan' => 'required|string|in:Tersedia,Penuh',
        ]);

        // Update status ruang kelas
        $ruang = Ruang::where('kode_ruang', $request->kode)->firstOrFail();
        $ruang->status_ketersediaan = $request->input('status_ketersediaan'); // Perbaikan
        $ruang->save();

        return redirect()->route('akademik.dashboard')->with('success', 'Status ruang berhasil diperbarui.');
    }
    
    public function setAllRuang(Request $request)
    {
        // Validasi input
        $request->validate([
            'status_ketersediaan' => 'required|array',
            'status_ketersediaan.*' => 'required|in:Tersedia,Penuh',
            'prodi' => 'nullable|string|exists:prodi,kode_prodi',
        ]);
    
        // Ambil input status_ketersediaan
        $status_ketersediaan = $request->input('status_ketersediaan');
    
        // Perbarui data berdasarkan kode ruang
        foreach ($status_ketersediaan as $kode_ruang => $status) {
            $ruang = Ruang::where('kode_ruang', $kode_ruang)->first();
            if ($ruang) {
                $ruang->status_ketersediaan = $status;
                $ruang->save();
            }
        }
    
        return back()->with('success', 'Semua ruang telah berhasil diperbarui sesuai dengan status yang dipilih.');
    }    
}