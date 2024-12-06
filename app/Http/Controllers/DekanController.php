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
        // Ambil kode departemen dekan yang sedang login
        $kodeDepartemen = Auth::user()->dosen->departemen->kode_departemen;

        // Cari semua prodi yang terkait dengan departemen dekan
        $prodis = Prodi::all();

        // Ambil prodi yang dipilih dari request, jika ada
        $selectedProdi = $request->input('prodi');

        // Ambil jadwal berdasarkan prodi yang dipilih
        $jadwals = Jadwal::when($selectedProdi, function ($query, $selectedProdi) {
            $query->whereHas('mataKuliah', function ($query) use ($selectedProdi) {
                $query->where('kode_prodi', $selectedProdi);
            });
        })->get();

        // Ambil ruang yang hanya terkait dengan jadwal yang sudah difilter
        $ruangs = Ruang::whereHas('jadwal', function ($query) use ($selectedProdi) {
            $query->whereHas('mataKuliah', function ($query) use ($selectedProdi) {
                $query->where('kode_prodi', $selectedProdi);
            });
        })->get();

        // Kirim data ke view
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

        // Ambil hanya ruang yang terkait dengan jadwal prodi yang dipilih
        $ruangs = Ruang::whereHas('jadwal', function ($query) use ($selectedProdi) {
            $query->whereHas('mataKuliah', function ($query) use ($selectedProdi) {
                $query->where('kode_prodi', $selectedProdi);
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