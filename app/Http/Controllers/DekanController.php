<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Ruang;
use App\Models\Prodi;

class DekanController extends Controller
{
    public function index(Request $request)
    {
        // Get all study programs related to dean's department
        $prodis = Prodi::all();
        
        // Get selected prodi from request
        $selectedProdi = $request->input('prodi');
        
        // Get schedules based on selected prodi
        $jadwals = Jadwal::when($selectedProdi, function ($query, $selectedProdi) {
            $query->whereHas('mataKuliah', function ($query) use ($selectedProdi) {
                $query->where('kode_prodi', $selectedProdi);
            });
        })->get();

        // Ambil ruang berdasarkan prodi yang dipilih
        $ruangs = Ruang::when($selectedProdi, function ($query, $selectedProdi) {
            return $query->whereHas('jadwal', function ($query) use ($selectedProdi) {
                $query->whereHas('mataKuliah', function ($query) use ($selectedProdi) {
                    $query->where('kode_prodi', $selectedProdi);
                });
            });
        })->get();

        return view('dekan.dashboard', [
            'jadwals' => $jadwals,
            'ruangs' => $ruangs,
            'prodis' => $prodis,
            'selectedProdi' => $selectedProdi,
        ]);
    }

    public function setJadwal(Request $request)
    {
        // Proses untuk menetapkan jadwal
        $jadwal = Jadwal::findOrFail($request->input('id_jadwal'));
        $jadwal->status = 'Disetujui';
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
        $selectedProdi = $request->input('prodi');

        // Ambil hanya jadwal berdasarkan prodi yang dipilih
        $jadwals = Jadwal::whereHas('mataKuliah', function ($query) use ($selectedProdi) {
            $query->where('kode_prodi', $selectedProdi);
        })->get();

        // Perbarui status hanya untuk jadwal yang difilter
        foreach ($jadwals as $jadwal) {
            $jadwal->status = 'Disetujui';
            $jadwal->save();
        }

        return back()->with('success', 'Semua jadwal untuk prodi yang dipilih berhasil disetujui.');
    }

    public function setAllRuang(Request $request)
    {
        $selectedProdi = $request->input('prodi');
        $status_ketersediaan = $request->input('status_ketersediaan');

        // Ambil hanya ruang yang terkait dengan prodi yang dipilih
        $ruangs = Ruang::when($selectedProdi, function ($query, $selectedProdi) {
            return $query->whereHas('jadwal', function ($query) use ($selectedProdi) {
                $query->whereHas('mataKuliah', function ($query) use ($selectedProdi) {
                    $query->where('kode_prodi', $selectedProdi);
                });
            });
        })->get();

        // Perbarui status ketersediaan untuk ruang yang relevan
        foreach ($ruangs as $ruang) {
            if (isset($status_ketersediaan[$ruang->kode_ruang])) {
                $ruang->status_ketersediaan = $status_ketersediaan[$ruang->kode_ruang];
                $ruang->save();
            }
        }

        return back()->with('success', 'Semua status ruang untuk prodi yang dipilih berhasil diperbarui.');
    }
}