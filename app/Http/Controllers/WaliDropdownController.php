<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaliDropdownController extends Controller
{
    public function fetchTahun(Request $request)
    {
        $user = Auth::user();
        $departemenId = $request->departemen_id;
        
        // Get the prodi IDs for the specified departemen
        $prodiIds = Prodi::where('kode_departemen', $departemenId)->pluck('kode_prodi');
        
        // Fetch unique 'tahun_masuk' for mahasiswa related to the dosen and filtered by prodi
        $tahunMasukList = $user->dosen->mahasiswa()
            ->whereIn('kode_prodi', $prodiIds)
            ->pluck('tahun_masuk')
            ->unique()
            ->values();
        
        return response()->json(['tahun' => $tahunMasukList]);
    }   


    public function fetchMahasiswa(Request $request)
    {
        $user = Auth::user();
        $departemen = $request->departemen;
        $tahun = $request->tahun;
        $status = $request->status;
        $prodiIds = Prodi::where('kode_departemen', $departemen)->pluck('kode_prodi');
    
        // Mendapatkan kode tahun dari tahun ajaran yang aktif
        $tahunAjaranAktif = Tahun::where('status', 'aktif')->first('kode_tahun');
    
        if (!$tahunAjaranAktif) {
            return response()->json(['message' => 'Tahun ajaran aktif tidak ditemukan.'], 404);
        }
    
        // Mengambil daftar mahasiswa berdasarkan kriteria
        $mahasiswaList = $user->dosen->mahasiswa()
            ->whereIn('kode_prodi', $prodiIds)
            ->where('tahun_masuk', $tahun)
            ->whereHas('irs', function ($query) use ($status, $tahunAjaranAktif) {
                $query->where('status', $status)
                      ->where('tahun_akademik', $tahunAjaranAktif->kode_tahun);
            })
            ->with(['irs', 'prodi'])
            ->get();
    
        return response()->json(['mahasiswa' => $mahasiswaList, 'tahun_ajaran_aktif' => $tahunAjaranAktif]);
    }
    


    public function fetchDoswal(Request $request){
        $departemen = $request->id_departemen;
        $DosenList = Dosen::where('kode_departemen',$departemen)->get(['nidn','nama'])->flatten();
        return response()->json(['dosen' => $DosenList]);
    }
}
