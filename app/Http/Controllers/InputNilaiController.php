<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DosenPengampu;
use App\Models\Jadwal;
use App\Models\KHS;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InputNilaiController extends Controller
{
    public function index(Request $request){
        $nidn = Auth::user()->dosen->nidn;
        $mataKuliahDiampu = DosenPengampu::where('nidn_dosen', $nidn)
        ->with(['jadwal.mataKuliah']) // Muat relasi ke jadwal dan mata kuliah
        ->get()
        ->map(function ($dosenPengampu) {
            return $dosenPengampu->jadwal->mataKuliah;
        })
        ->unique('kode_mk'); // Hilangkan duplikat mata kuliah

        return view('dosen.input_nilai', compact('mataKuliahDiampu'));
    }

    public function getStatusPengambilan($nim, $idMataKuliah)
    {
        // Ambil data KHS mahasiswa
        $khs = KHS::where('nim', $nim)
            ->where('kode_mk', $idMataKuliah)
            ->orderBy('semester', 'desc') // Prioritaskan semester terbaru
            ->first();

        if (!$khs) {
            return 'Baru'; // Default jika tidak ada data KHS
        }

        // Logika status pengambilan
        if ($khs->nilai < 60) {
            return 'Mengulang';
        } elseif ($khs->nilai >= 60 && $khs->nilai < 80) {
            return 'Perbaikan';
        } else {
            return 'Baru';
        }
    }

    public function fetchMhs(Request $request){
        $kode_mk = $request->kode_mk; 
        $tahun = Tahun::where('status', 'aktif')->value('kode_tahun');
        $mahasiswaList = MataKuliah::where('kode_mk', $kode_mk)
        ->with(['jadwal.detailIRS.irs.mahasiswa', 'jadwal.detailIRS.irs'])
        ->get()
        ->flatMap(function ($mataKuliah) {
            return $mataKuliah->jadwal->flatMap(function ($jadwal) {
                $kelas = $jadwal->kode_kelas;
                return $jadwal->detailIRS->map(function ($detailIRS) use($kelas) {
                    $mahasiswa = $detailIRS->irs->mahasiswa;
                    return [
                        'nim' => $mahasiswa->nim,
                        'nama' => $mahasiswa->nama,
                        'kelas' => $kelas,
                        'semester_pengambilan' => $detailIRS->irs->semester,
                        'status_pengambilan' => $this->getStatusPengambilan($mahasiswa->nim, $detailIRS->jadwal->id_mata_kuliah),
                    ];
                });
            });
        });

    return response()->json($mahasiswaList);
    }

    public function checkKHS(Request $request)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|string',
        ]);

        // Ambil parameter dari request
        $nim = $request->nim;
        $semesterMhs = Mahasiswa::where('nim',$nim)->value('semester');

        // Query untuk mencari data di KHS
        $existingData = KHS::where('nim', $nim)
            ->where('semester', $semesterMhs)
            ->first();

        // Respon jika data ditemukan atau tidak ditemukan
        if ($existingData) {
            return response()->json([
                'exists' => true,
                'data' => $existingData,
            ], 200);
        } else {
            return response()->json([
                'exists' => false,
                'message' => 'Data tidak ditemukan.',
            ], 404);
        }
    }

    public function updateKHS(Request $request) {
        $validated = $request->validate([
            'nim' => 'required|string',
            'kode_mk' => 'required|string',
            'nilai' => 'required|numeric|min:0|max:100'
        ]);
        $nim = $validated['nim'];
        $semesterMhs = Mahasiswa::where('nim',$nim)->value('semester');
        
        try {
            $khs = KHS::updateOrCreate(
                [
                    'nim' => $nim,
                    'kode_mk' => $validated['kode_mk'],
                    'semester' => $semesterMhs
                ],
                [
                    'nilai' => $validated['nilai']
                ]
            );
            
    
            return response()->json([
                'success' => true,
                'message' => 'Nilai berhasil diperbarui.',
                'data' => $khs
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui nilai: ' . $e->getMessage()
            ], 500);
        }
    }
}
