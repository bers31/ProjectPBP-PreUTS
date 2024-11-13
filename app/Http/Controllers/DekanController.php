<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\RuangKelas;
use Illuminate\Http\Request;

class DekanController extends Controller
{
    public function index()
    {
        // Ambil data jadwal dan ruang kelas dari database
        $jadwals = Jadwal::all();      // Pastikan tabel dan data Jadwal ada
        $ruangs = RuangKelas::all();   // Pastikan tabel dan data RuangKelas ada

        // Kirim data jadwal dan ruang ke view dashboard dekan
        return view('dekan.dashboard', compact('jadwals', 'ruangs'));
    }

    public function setJadwal(Request $request)
    {
        // Proses untuk menetapkan jadwal
        $jadwal = Jadwal::findOrFail($request->input('jadwal_id'));
        $jadwal->status = 'ditetapkan';
        $jadwal->save();

        return redirect()->route('dekan.dashboard')->with('success', 'Jadwal berhasil ditetapkan.');
    }

    public function setRuang(Request $request)
    {
        // Proses untuk menetapkan ketersediaan ruang kelas
        $ruang = RuangKelas::findOrFail($request->input('ruang_id'));
        $ruang->status_ketersediaan = $request->input('status_ketersediaan');
        $ruang->save();

        return redirect()->route('dekan.dashboard')->with('success', 'Ketersediaan ruang berhasil diperbarui.');
    }
}