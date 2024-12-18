<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailIRS;
use App\Models\IRS;
use App\Models\Mahasiswa;
use App\Models\Tahun;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf ;
use Carbon\Carbon;
use Illuminate\Http\Request;




class PDFController extends Controller
{
    //
    public function printIRS($nim)
    {
        $tahunAjaranAktif = Tahun::where('status', 'aktif')->first(['kode_tahun', 'bag_semester']);

        // Retrieve the IRS record for the active academic year
        $irs = IRS::where('nim_mahasiswa', $nim)
            ->where('kode_tahun', $tahunAjaranAktif->kode_tahun)
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
        $tahunAjaranAktif = Tahun::where('status', 'aktif')->first(['kode_tahun', 'bag_semester', 'tahun_akademik']);
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
    
        // Retrieve the IRS record for the active academic year
        $irs = IRS::where('nim_mahasiswa', $nim)
            ->where('kode_tahun', $tahunAjaranAktif->kode_tahun)
            ->first(['id_irs', 'status']); // Use first() to get a single record
    
        // Handle the case where no IRS record is found
        if (!$irs) {
            return response()->json(['message' => 'IRS record not found for the given NIM and active academic year.'], 404);
        }
    
        // Fetch the list of schedules associated with the IRS along with mataKuliah and dosenPengampu
        $ListJadwal = DetailIRS::where('id_irs', $irs->id_irs)
            ->with([
                'jadwal.mataKuliah',
                'jadwal.dosen_pengampu' => function ($query) {
                    $query->select('id_jadwal', 'nidn_dosen'); // Specify the columns you need
                }
            ])
            ->get();
    
        // Set locale and format the current date
        Carbon::setLocale('idn');
        $date = now()->translatedFormat('d F Y');
    
        // Return the view with compacted data
        return view('print_irs', compact(['ListJadwal', 'mahasiswa', 'tahunAjaranAktif', 'date']));
    }
}
