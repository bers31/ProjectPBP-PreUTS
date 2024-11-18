<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruang;

class AkademikController extends Controller
{
    /**
     * Menampilkan Dashboard Akademik.
     */
    public function index()
    {
        // Ambil data profil dan ruang kelas untuk dashboard akademik
        $ruangs = ruang::all();

        return view('akademik.dashboard', [
            'ruangs' => $ruangs,
        ]);
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
        $ruang = ruang::where('kode_ruang', $request->kode)->firstOrFail();
        $ruang->status_ketersediaan = $request->status_ketersediaan;
        $ruang->save();

        return redirect()->route('akademik.dashboard')->with('success', 'Status ruang berhasil diperbarui.');
    }
}