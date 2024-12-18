<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KHS;
use Illuminate\Http\Request;

class KHSController extends Controller
{
    public function fetchHistoryKHS(Request $request)
{
    $nim = $request->input('nim');
   
    // Fetch KHS data for the specific mahasiswa
    $historyKHS = KHS::where('nim', $nim)
        ->with(['mahasiswa', 'matakuliah'])
        ->get()
        ->groupBy('semester')
        ->map(function ($semesterKHS, $semester) {
            // Calculate total SKS and convert grades
            $totalSks = 0;
            $totalNilaiBobot = 0;

            $processedKHS = $semesterKHS->map(function ($khs) use (&$totalSks, &$totalNilaiBobot) {
                // Grade conversion logic with bobot
                $nilai = $khs->nilai;
                if ($nilai >= 80) {
                    $convertedNilai = 'A';
                    $nilaiBobot = 4.0;
                } elseif ($nilai >= 70) {
                    $convertedNilai = 'B';
                    $nilaiBobot = 3.0;
                } elseif ($nilai >= 60) {
                    $convertedNilai = 'C';
                    $nilaiBobot = 2.0;
                } elseif ($nilai >= 50) {
                    $convertedNilai = 'D';
                    $nilaiBobot = 1.0;
                } else {
                    $convertedNilai = 'E';
                    $nilaiBobot = 0.0;
                }

                // Add SKS to total
                $totalSks += $khs->matakuliah->sks;

                // Calculate weighted grade points
                $bobotNilai = $khs->matakuliah->sks * $nilaiBobot;
                $totalNilaiBobot += $bobotNilai;

                return [
                    'kode_mk' => $khs->kode_mk,
                    'nama_mk' => $khs->matakuliah->nama_mk,
                    'sks' => $khs->matakuliah->sks,
                    'nilai_angka' => $khs->nilai,
                    'nilai_huruf' => $convertedNilai,
                    'nilai_bobot' => $nilaiBobot
                ];
            });

            // Calculate IP Semester (Indeks Prestasi Semester)
            $ipSemester = $totalSks > 0 ? round($totalNilaiBobot / $totalSks, 2) : 0;

            return [
                'semester' => $semester,
                'tahun_akademik' => $semesterKHS->first()->tahun_akademik, // Assuming you have this field
                'mata_kuliah' => $processedKHS,
                'total_sks' => $totalSks,
                'ip_semester' => $ipSemester
            ];
        })
        ->values(); // Reset array keys

    return response()->json([
        'history_khs' => $historyKHS
    ]);
}
}
