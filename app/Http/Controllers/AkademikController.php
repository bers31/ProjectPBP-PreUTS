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
    public function dashboard(Request $request)
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
        $ruang->status_ketersediaan = $request->status_ketersediaan;
        $ruang->save();

        return redirect()->route('akademik.dashboard')->with('success', 'Status ruang berhasil diperbarui.');
    }
    public function setAllRuang(Request $request)
    {
        // Ambil kode prodi dan status ketersediaan dari request
        $selectedProdi = $request->input('prodi');
        $status_ketersediaan = $request->input('status_ketersediaan'); // status_ketersediaan berupa array
    
        // Ambil ruang berdasarkan prodi yang dipilih
        $ruangs = Ruang::whereHas('jadwal', function ($query) use ($selectedProdi) {
            $query->whereHas('mataKuliah', function ($query) use ($selectedProdi) {
                $query->where('kode_prodi', $selectedProdi);
            });
        })->get();
    
        // Perbarui status ketersediaan untuk ruang yang sesuai
        foreach ($ruangs as $ruang) {
            // Cek apakah status ketersediaan untuk ruang ini ada di array status_ketersediaan
            if (isset($status_ketersediaan[$ruang->kode_ruang])) {
                $ruang->status_ketersediaan = $status_ketersediaan[$ruang->kode_ruang];  // Update hanya jika ada status yang dipilih
                $ruang->save();
            }
        }
    
        return back()->with('success', 'Semua ruang telah berhasil diperbarui sesuai dengan status yang dipilih.');
    }
    
}