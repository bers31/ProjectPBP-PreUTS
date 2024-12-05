<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DosenPengampu;
use App\Models\Jadwal;
use App\Models\KHS;
use App\Models\MataKuliah;
use App\Models\Tahun;
use Illuminate\Http\Request;

class InputNilaiController extends Controller
{
    public function index($nidn){
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

}
