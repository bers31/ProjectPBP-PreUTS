<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jadwal;
use App\Models\ruang;

class DekanController extends Controller
{
    public function index()
    {
        // Ambil data jadwal dan ruang kelas dari database
        $jadwals = jadwal::all();      // Pastikan tabel dan data Jadwal ada
        $ruangs = ruang::all();   // Pastikan tabel dan data RuangKelas ada

        // Kirim data jadwal dan ruang ke view dashboard dekan
        return view('dekan.dashboard',[
            'ruangs' => $ruangs,
            'jadwals' => $jadwals
        ]);
    }

    public function setJadwal(Request $request)
    {
        // Proses untuk menetapkan jadwal
        $jadwal = jadwal::findOrFail($request->input('id_jadwal'));
        $jadwal->status = 'disetujui';
        $jadwal->save();

        return redirect()->route('dekan.dashboard')->with('success', 'Jadwal berhasil ditetapkan.');
    }

    public function setRuang(Request $request)
    {
        // Proses untuk menetapkan ketersediaan ruang kelas
        $ruang = ruang::findOrFail($request->input('kode_ruang'));
        $ruang->status_ketersediaan = $request->input('status_ketersediaan');
        $ruang->save();

        return redirect()->route('dekan.dashboard')->with('success', 'Ketersediaan ruang berhasil diperbarui.');
    }
}