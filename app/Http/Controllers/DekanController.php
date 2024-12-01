<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Ruang;

class DekanController extends Controller
{
    public function index()
    {
        // Ambil data jadwal dan ruang kelas dari database
        $jadwals = Jadwal::all();      // Pastikan tabel dan data Jadwal ada
        $ruangs = Ruang::all();   // Pastikan tabel dan data RuangKelas ada

        // Kirim data jadwal dan ruang ke view dashboard dekan
        return view('dekan.dashboard',[
            'ruangs' => $ruangs,
            'jadwals' => $jadwals
        ]);
    }

    public function setJadwal(Request $request)
    {
        // Proses untuk menetapkan jadwal
        $jadwal = Jadwal::findOrFail($request->input('id_jadwal'));
        $jadwal->status = 'disetujui';
        $jadwal->save();

        return redirect()->route('dekan.dashboard')->with('success', 'Jadwal berhasil ditetapkan.');
    }

    public function setRuang(Request $request)
    {
        // Proses untuk menetapkan ketersediaan ruang kelas
        $ruang = Ruang::findOrFail($request->input('kode_ruang'));
        $ruang->status_ketersediaan = $request->input('status_ketersediaan');
        $ruang->save();

        return redirect()->route('dekan.dashboard')->with('success', 'Ketersediaan ruang berhasil diperbarui.');
    }

    public function setAllJadwal(Request $request)
    {
        $jadwals = Jadwal::all(); // Ambil semua jadwal dari database
        foreach ($jadwals as $jadwal) {
            // Logika untuk menyetujui jadwal
            $jadwal->status = 'Disetujui';
            $jadwal->save();
        }

        return back()->with('success', 'Semua jadwal berhasil disetujui.');
    }

    public function setAllRuang(Request $request)
    {
        $ruangs = Ruang::all(); // Ambil semua ruang dari database
        $status_ketersediaan = $request->input('status_ketersediaan'); // Ambil array status_ketersediaan

        foreach ($ruangs as $ruang) {
            // Pastikan nilai status ada sebelum menyimpannya
            if (isset($status_ketersediaan[$ruang->kode_ruang])) {
                $ruang->status_ketersediaan = $status_ketersediaan[$ruang->kode_ruang];
                $ruang->save();
            }
        }

        return back()->with('success', 'Semua status ruang berhasil diperbarui.');
    }


}
