<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailIRS;
use App\Models\IRS;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IRSController extends Controller
{
    // Display IRS page for a specific Mahasiswa
    public function index(Request $request)
    {
        // Assuming you use authenticated Mahasiswa
        $nim = Auth::user()->mahasiswa->nim;

        // Get the Mahasiswa's IRS record
        $irs = IRS::where('nim_mahasiswa', $nim)->firstOrFail();

        // Get all the jadwals (for selection)
        $jadwals = Jadwal::all();

        // Get all the detail IRS entries for this IRS
        $detailIrs = DetailIrs::where('id_irs', $irs->id_irs)->get();

        $totalSKS = $detailIrs->sum(function ($detail) {
            return $detail->jadwal->mataKuliah->sks ?? 0;
        });

        return view('mahasiswa.irs_mhs', compact('irs', 'jadwals', 'detailIrs', 'totalSKS'));
    }

    // Add jadwal to detail IRS
    public function add(Request $request)
    {
        $request->validate([
            'id_irs' => 'required|exists:irs,id_irs', // Ensure the IRS ID exists in the IRS table
            'id_jadwal' => 'required|exists:jadwal,id_jadwal', // Ensure the Jadwal ID exists in the Jadwal table
        ]);


        // // Check if the jadwal already exists in detail_irs
        // $exists = DetailIrs::where('id_jadwal', $request->id_jadwal)
        //     ->where('id_irs', $request->id_irs)
        //     ->exists();

        // if ($exists) {
        //     return response()->json(['message' => 'Jadwal already added'], 400);
        // }

        // Add jadwal to detail_irs
        DetailIrs::create([
            'id_irs' => $request->id_irs,
            'id_jadwal' => $request->id_jadwal,
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
