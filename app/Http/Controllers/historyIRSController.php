<?php

namespace App\Http\Controllers;

use App\Models\DetailIRS;
use App\Models\IRS;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class historyIRSController extends Controller
{
    //
    public function index(Request $request)
    {
        // Get the logged-in mahasiswa
        $mahasiswa = Auth::user()->mahasiswa;
        $nim = $mahasiswa->nim;
    
        // Get all IRS for this mahasiswa
        $irsList = IRS::where('nim_mahasiswa', $nim)->get();
        
        // Extract all id_irs from the IRS list
        $irsIds = $irsList->pluck('id_irs')->toArray();
        
        // Get all DetailIRS for these IRS records
        $detailIRSList = DetailIRS::whereIn('id_irs', $irsIds)->get();
        
        // Extract all id_jadwal from the DetailIRS list
        $jadwalIds = $detailIRSList->pluck('id_jadwal')->toArray();
        
        // Get all Jadwal records with eager loading of related models
        $jadwalList = Jadwal::with(['mataKuliah', 'dosen_pengampu.dosen'])
            ->whereIn('id_jadwal', $jadwalIds)
            ->get();
        
        // Calculate SKS for each Detail IRS
        $detailIRSWithTotalSKS = $detailIRSList->map(function ($detailIRS) use ($jadwalList) {
            // Find the jadwal for this detailIRS
            $jadwal = $jadwalList->firstWhere('id_jadwal', $detailIRS->id_jadwal);
        
            // Calculate total SKS from mata kuliah associated with this jadwal
            $totalSKS = $jadwal->mataKuliah->sks ?? 0;
        
            // Attach totalSKS to the detailIRS
            $detailIRS->total_sks = $totalSKS;
        
            return $detailIRS;
        });
        
        // Group Jadwal records by their IRS ID
        $jadwalByIRS = $irsList->mapWithKeys(function ($irs) use ($detailIRSList, $jadwalList) {
            // Find all DetailIRS for this IRS
            $detailIRSForThisIRS = $detailIRSList->where('id_irs', $irs->id_irs);
        
            // Find all Jadwal for these DetailIRS
            $jadwalForThisIRS = $detailIRSForThisIRS->map(function ($detailIRS) use ($jadwalList) {
                return $jadwalList->where('id_jadwal', $detailIRS->id_jadwal);
            })->flatten();
        
            return [$irs->id_irs => $jadwalForThisIRS];
        });
    
        // Return the data to the view
        return view('mahasiswa.history_irs', compact('irsList', 'detailIRSWithTotalSKS', 'jadwalByIRS'));
    }
    
    
    
    

}
