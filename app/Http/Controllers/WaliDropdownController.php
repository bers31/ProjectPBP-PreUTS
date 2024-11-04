<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dosen;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaliDropdownController extends Controller
{
    public function fetchTahun(Request $request)
    {
        $user = Auth::user();
        $departemenId = $request->departemen_id;

        $tahunMasukList = $user->dosen
            ->with(['mahasiswa' => function ($query) use ($departemenId) {
                // Filter mahasiswa berdasarkan departemen
                $query->where('departemen', $departemenId);
            }])
            ->get()
            ->pluck('mahasiswa.*.tahun_masuk')
            ->flatten()
            ->unique();

        return response()->json(['tahun' => $tahunMasukList]);
    }

    public function fetchMahasiswa(Request $request)
    {
        $user = Auth::user();
        $departemen = $request->departemen;
        $tahun = $request->tahun;

        // Mengambil mahasiswa berdasarkan departemen dan tahun_masuk
        $mahasiswaList = $user->dosen
            ->with(['mahasiswa' => function ($query) use ($departemen, $tahun) {
                $query->where('departemen', $departemen)
                      ->where('tahun_masuk', $tahun);
            }])
            ->get()
            ->pluck('mahasiswa')
            ->flatten();

        return response()->json(['mahasiswa' => $mahasiswaList]);
    }

    public function fetchDoswal(Request $request){
        $departemen = $request->id_departemen;
        $DosenList = Dosen::where('kode_departemen',$departemen)->get(['nidn','nama'])->flatten();
        return response()->json(['dosen' => $DosenList]);
    }
}
