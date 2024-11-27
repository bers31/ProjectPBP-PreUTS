<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailIRS;
use App\Models\Dosen;
use App\Models\IRS;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaliController extends Controller
{
    public function fetchTahun(Request $request)
    {
        $user = Auth::user();
        $prodi = $request->prodi;
        
        // Get the prodi IDs for the specified departemen
        $prodiIds = Prodi::where('kode_prodi', $prodi)->pluck('kode_prodi');
        
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
        $flag = $request->is_status_mahasiswa;
        $prodi = $request->prodi;
        $tahun = $request->tahun;
        $status = $request->status;
        $prodiIds = Prodi::where('kode_prodi', $prodi)->pluck('kode_prodi');
    
        // Mendapatkan kode tahun dari tahun ajaran yang aktif
        $tahunAjaranAktif = Tahun::where('status', 'aktif')->first('kode_tahun');
    
        if (!$tahunAjaranAktif) {
            return response()->json(['message' => 'Tahun ajaran aktif tidak ditemukan.'], 404);
        }
    
        // Query untuk menghitung total status dari semua mahasiswa perwalian
        $allMahasiswaQuery = $user->dosen->mahasiswa();
    
        // Hitung status counts untuk semua mahasiswa perwalian (tanpa filter)
        $statusCounts = [
            'belum_irs' => (clone $allMahasiswaQuery)
                ->whereHas('irs', function ($query) use ($tahunAjaranAktif) {
                    $query->where('kode_tahun', $tahunAjaranAktif->kode_tahun)
                        ->where('status', 'belum_irs');
                })->count(),
            'belum_disetujui' => (clone $allMahasiswaQuery)
                ->whereHas('irs', function ($query) use ($tahunAjaranAktif) {
                    $query->where('kode_tahun', $tahunAjaranAktif->kode_tahun)
                        ->where('status', 'belum_disetujui');
                })->count(),
            'sudah_disetujui' => (clone $allMahasiswaQuery)
                ->whereHas('irs', function ($query) use ($tahunAjaranAktif) {
                    $query->where('kode_tahun', $tahunAjaranAktif->kode_tahun)
                        ->where('status', 'sudah_disetujui');
                })->count(),
            'non_aktif' => (clone $allMahasiswaQuery)
                ->where('status', 'non-aktif')->count()
        ];
    
        // Query untuk data mahasiswa dengan filter
        $mahasiswaList = ($flag) ? $user->dosen->mahasiswa()->whereNot('status','aktif')->with(['prodi'])->get() : $user->dosen->mahasiswa()
            ->when($prodi, function ($query) use ($prodi) {
                $query->where('kode_prodi', $prodi);
            })
            ->when($tahun, function ($query) use ($tahun) {
                $query->where('tahun_masuk', $tahun);
            })
            ->whereHas('irs', function ($query) use ($status, $tahunAjaranAktif) {
                $query->where('kode_tahun', $tahunAjaranAktif->kode_tahun)
                    ->when($status, function ($query) use ($status) {
                        $query->where('status', $status);
                    });
            })
            ->with(['irs', 'prodi'])
            ->get();
    
        return response()->json([
            'mahasiswa' => $mahasiswaList,
            'tahun_ajaran_aktif' => $tahunAjaranAktif,
            'status_counts' => $statusCounts,
            'is_status_mahasiswa' => $flag
        ]);
    }
    


    public function fetchDoswal(Request $request){
        $departemen = $request->id_departemen;
        $DosenList = Dosen::where('kode_departemen',$departemen)->get(['nidn','nama'])->flatten();
        return response()->json(['dosen' => $DosenList]);
    }

    public function view($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();
        return view('dosen.perwalian.view', [
            'mahasiswa' => $mahasiswa,
            'nim' => $nim, // Pass nim to the view
        ]);
    }
    
    
    public function fetchAjuanIRS(Request $request){
        $tahunAjaranAktif = Tahun::where('status', 'aktif')->value('kode_tahun');
        $nim = $request->nim;
        $id_irs = IRS::where('nim_mahasiswa', $nim)->where('kode_tahun', $tahunAjaranAktif)->value('id_irs');
        $ListJadwal = DetailIRS::where('id_irs', $id_irs)->with(['jadwal.mataKuliah'])->get();
        return response()->json(['aju_irs' => $ListJadwal]);
    } 

    public function fetchHistoryIRS(Request $request)
    {
        $nim = $request->nim;

        // Fetch all IRS records for the student, sorted by semester
        $historyIRS = IRS::where('nim_mahasiswa', $nim)
            ->orderBy('semester', 'asc')
            ->with(['detailIRS.jadwal.mataKuliah', 'tahun'])
            ->get();

        // Transform data for frontend
        $formattedHistory = $historyIRS->map(function($irs) {
            $totalSKS = 0;
            $jadwalList = $irs->detailIRS->map(function($detail) use (&$totalSKS) {
                $totalSKS += $detail->jadwal->mataKuliah->sks;
                return [
                    'kode_mk' => $detail->jadwal->kode_mk,
                    'nama_mk' => $detail->jadwal->mataKuliah->nama_mk,
                    'sks' => $detail->jadwal->mataKuliah->sks,
                    'kode_kelas' => $detail->jadwal->kode_kelas,
                    'hari' => $detail->jadwal->hari,
                    'jam_mulai' => $detail->jadwal->jam_mulai,
                    'jam_selesai' => $detail->jadwal->jam_selesai,
                    'ruang' => $detail->jadwal->ruang,
                    'dosen' => $detail->jadwal->dosen ?? 'Tidak Tersedia'
                ];
            });

            return [
                'semester' => $irs->semester,
                'tahun_akademik' => $irs->tahun->tahun_akademik ?? 'Tidak Tersedia',
                'total_sks' => $totalSKS,
                'jadwal' => $jadwalList
            ];
        });

        return response()->json(['history_irs' => $formattedHistory]);
    }


}
