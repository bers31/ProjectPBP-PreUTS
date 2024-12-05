<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Ruang;
use App\Models\Prodi;

class DekanController extends Controller
{
    public function index()
    {
        // Ambil kode departemen dekan yang sedang login
        $kodeDepartemen = Auth::user()->dosen->departemen->kode_departemen;

        // Cari kode prodi yang terkait dengan departemen dekan
        $prodis = Prodi::where('kode_departemen', $kodeDepartemen)->pluck('kode_prodi');

        // Ambil jadwal yang hanya terkait dengan prodi tersebut
        $jadwals = Jadwal::whereHas('mataKuliah', function ($query) use ($prodis) {
            $query->whereIn('kode_prodi', $prodis);
        })->get();

        // Data ruang tetap diambil semuanya
        $ruangs = Ruang::all();

        // Kirim data ke view
        return view('dekan.dashboard', [
            'jadwals' => $jadwals,
            'ruangs' => $ruangs,
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
