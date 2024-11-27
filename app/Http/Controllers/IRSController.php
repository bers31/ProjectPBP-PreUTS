<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailIRS;
use App\Models\IRS;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IRSController extends Controller
{
    // Display IRS page for a specific Mahasiswa
    public function index(Request $request)
    {   

        // get mahasiswa
        $mahasiswa = Auth::user()->mahasiswa;
        
        // Get mahasiswa nim
        $nim = $mahasiswa->nim;

        // Get the Mahasiswa's IRS record
        $irs = IRS::where('nim_mahasiswa', $nim)->firstOrFail();

        // mengambil irs terbaru
        $latestIrs = $mahasiswa->irs()->latest()->first();
    
        // Get Mahasiswa's semester
        $semesterMHS = Mahasiswa::where('nim', $nim)->value('semester');

        // Get all Mata Kuliah for the semester
        $mataKuliah = MataKuliah::where('semester', $semesterMHS)->get();

        // Get all Jadwal based on Mata Kuliah kode_mk
        $jadwals = Jadwal::whereIn('kode_mk', $mataKuliah->pluck('kode_mk'))->get();

        // Remove duplicate Mata Kuliah from Jadwal
        $jadwalsAmbil = $jadwals->unique('kode_mk');

        // Get all the detail IRS entries for this IRS
        $detailIrs = DetailIrs::where('id_irs', $irs->id_irs)->get();

        // Calculate total SKS
        $totalSKS = $detailIrs->sum(function ($detail) {
            return $detail->jadwal->mataKuliah->sks ?? 0;
        });

        return view('mahasiswa.irs_mhs', compact('irs', 'jadwals',  'jadwalsAmbil', 'detailIrs', 'latestIrs', 'totalSKS'));
    }

    // Add jadwal to detail IRS
    public function add(Request $request)
    {
        $request->validate([
            'id_irs' => 'required|exists:irs,id_irs', // Ensure the IRS ID exists in the IRS table
            'id_jadwal' => 'required|exists:jadwal,id_jadwal', // Ensure the Jadwal ID exists in the Jadwal table
        ]);

        $id_jadwal = $request->id_jadwal;
        $id_irs = $request->id_irs;

        // get mk
        $kode_mk = Jadwal::where('id_jadwal', $id_jadwal)->value('kode_mk');

        // check mk
        $existsMK = DetailIrs::where('id_irs', $id_irs)
            ->whereHas('jadwal', function ($query) use ($kode_mk, $id_jadwal) {
                $query->where('kode_mk', $kode_mk)
                    ->where('id_jadwal', '!=', $id_jadwal); // Pastikan id_jadwal berbeda
            })
            ->exists();

        if ($existsMK) {
            return redirect()->back()->with('error', 'Mata kuliah sudah diambil di jadwal lain!');
        }

        // check jadwal
        $existsJadwal = DetailIrs::where('id_irs', $id_irs)
            ->where('id_jadwal', $id_jadwal)
            ->exists();

        if ($existsJadwal) {
            return redirect()->back()->with('error', 'Jadwal sudah ada!');
        }

        // Add jadwal to detail_irs
        DetailIrs::create([
            'id_irs' => $id_irs,
            'id_jadwal' => $id_jadwal,
        ]);

        return redirect()->route('mahasiswa.irs_mhs')->with('success', 'Jadwal berhasil ditambahkan!');
    }


    public function delete(Request $request)
    {   
        // Validate the incoming request
        $request->validate([
            'id_irs' => 'required|exists:detail_irs,id_irs',
            'id_jadwal' => 'required|exists:detail_irs,id_jadwal',
        ]);
    
        // Find the record based on id_irs and id_jadwal
        $detailIrs = DetailIrs::where('id_irs', $request->id_irs)
            ->where('id_jadwal', $request->id_jadwal)
            ->first();

    
        // Delete the record
        $detailIrs->delete();
    
        // Redirect back with a success message
        return redirect()->route('mahasiswa.irs_mhs')->with('success', 'Jadwal berhasil dihapus!');
    }

}
