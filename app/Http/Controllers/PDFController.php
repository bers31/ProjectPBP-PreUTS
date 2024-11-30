<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailIRS;
use App\Models\IRS;
use App\Models\Tahun;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf ;
use Illuminate\Http\Request;


class PDFController extends Controller
{
    //
    public function printIRS($nim)
    {
        $tahunAjaranAktif = Tahun::where('status', 'aktif')->value('kode_tahun');
    
        // Retrieve the IRS record for the active academic year
        $irs = IRS::where('nim_mahasiswa', $nim)
            ->where('kode_tahun', $tahunAjaranAktif)
            ->first(['id_irs', 'status']); // Use `first()` to get a single record
    
        // Handle the case where no IRS record is found
        if (!$irs) {
            return response()->json(['message' => 'IRS record not found for the given NIM and active academic year.'], 404);
        }

        // Fetch the list of schedules associated with the IRS
        $ListJadwal = DetailIRS::where('id_irs', $irs->id_irs)
        ->with(['jadwal.mataKuliah'])
        ->get();

        $data = [
            'listJadwal' => $ListJadwal
        ];

        $pdf = Pdf::loadView('print_irs', $data);

        return $pdf->download('PRINT_IRS_MHS.pdf');
    }

    public function viewIRS($nim)
    {
        $tahunAjaranAktif = Tahun::where('status', 'aktif')->value('kode_tahun');
    
        // Retrieve the IRS record for the active academic year
        $irs = IRS::where('nim_mahasiswa', $nim)
            ->where('kode_tahun', $tahunAjaranAktif)
            ->first(['id_irs', 'status']); // Use `first()` to get a single record
    
        // Handle the case where no IRS record is found
        if (!$irs) {
            return response()->json(['message' => 'IRS record not found for the given NIM and active academic year.'], 404);
        }

        // Fetch the list of schedules associated with the IRS
        $ListJadwal = DetailIRS::where('id_irs', $irs->id_irs)
        ->with(['jadwal.mataKuliah'])
        ->get();

        // $data = [
        //     'listJadwal' => $ListJadwal
        // ];

        // $pdf = Pdf::loadView('print_irs', $data);

        return view('print_irs',compact('ListJadwal'));
    }
}
