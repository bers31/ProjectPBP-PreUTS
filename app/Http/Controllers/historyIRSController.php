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
    
        // Get all Jadwal records for these id_jadwal
        $jadwalList = Jadwal::whereIn('id_jadwal', $jadwalIds)->get();
    
        // Calculate SKS for each Detail IRS
        $detailIRSWithTotalSKS = $detailIRSList->map(function ($detailIRS) use ($jadwalList) {
            // Find the jadwal for this detailIRS
            $jadwal = $jadwalList->firstWhere('id_jadwal', $detailIRS->id_jadwal);
    
            // Calculate total SKS from mata kuliah associated with this jadwal
            $totalSKS = MataKuliah::where('kode_mk', $jadwal->kode_mk ?? null)->sum('sks');
    
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
    
    
    
    
    

    // public function showIRS(Request $request)
    // {
    //     $validated = $request->validate([
    //         'selectedIRS' => 'required|exists:irs,id_irs', // Validasi input
    //     ]);
    
    //     $id_irs = $validated['selectedIRS'];
    
    //     // Ambil detail IRS
    //     $detailIRS = DetailIRS::where('id_irs', $id_irs)->get();
    
    //     // Ambil jadwal terkait dari detail IRS
    //     $jadwal = Jadwal::whereIn('id_jadwal', $detailIRS->pluck('id_jadwal'))->get();
    
    //     // Ambil mata kuliah terkait dari jadwal
    //     $mk = MataKuliah::whereIn('kode_mk', $jadwal->pluck('kode_mk'))->get();
    
    //     // Hitung total SKS
    //     $totalSKS = $mk->sum('sks');
    
    //     // Gabungkan data nama mata kuliah dengan waktu jadwal
    //     $result = $jadwal->map(function ($item) use ($mk) {
    //         $mataKuliah = $mk->firstWhere('kode_mk', $item->kode_mk);
    //         return [
    //             'nama_mata_kuliah' => $mataKuliah ? $mataKuliah->nama : null,
    //             'waktu' => $item->waktu,
    //             'sks' => $mataKuliah ? $mataKuliah->sks : 0,
    //         ];
    //     });
    
    //     // Kembalikan data sebagai JSON dengan total SKS
    //     return response()->json([
    //         'mata_kuliah' => $result,
    //         'total_sks' => $totalSKS,
    //     ]);
    // }

    // public function fetchHistoryIRS(Request $request)
    // {
    //     $nim = $request->nim;

    //     // Fetch all IRS records for the student, sorted by semester
    //     $historyIRS = IRS::where('nim_mahasiswa', $nim)
    //         ->orderBy('semester', 'asc')
    //         ->with(['detailIRS.jadwal.mataKuliah', 'tahun'])
    //         ->get();

    //     // Transform data for frontend
    //     $formattedHistory = $historyIRS->map(function($irs) {
    //         $totalSKS = 0;
    //         $jadwalList = $irs->detailIRS->map(function($detail) use (&$totalSKS) {
    //             $totalSKS += $detail->jadwal->mataKuliah->sks;
    //             return [
    //                 'kode_mk' => $detail->jadwal->kode_mk,
    //                 'nama_mk' => $detail->jadwal->mataKuliah->nama_mk,
    //                 'sks' => $detail->jadwal->mataKuliah->sks,
    //                 'kode_kelas' => $detail->jadwal->kode_kelas,
    //                 'hari' => $detail->jadwal->hari,
    //                 'jam_mulai' => $detail->jadwal->jam_mulai,
    //                 'jam_selesai' => $detail->jadwal->jam_selesai,
    //                 'ruang' => $detail->jadwal->ruang,
    //                 'dosen' => $detail->jadwal->dosen ?? 'Tidak Tersedia'
    //             ];
    //         });

    //         return [
    //             'semester' => $irs->semester,
    //             'tahun_akademik' => $irs->tahun->tahun_akademik ?? 'Tidak Tersedia',
    //             'total_sks' => $totalSKS,
    //             'jadwal' => $jadwalList
    //         ];
    //     });

    //     return response()->json(['history_irs' => $formattedHistory]);
    // }
    
    
    

}
