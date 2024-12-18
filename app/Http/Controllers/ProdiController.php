<?php

namespace App\Http\Controllers;
use App\Models\Prodi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    //
    public function fetchProdi(Request $request){
        $departemen = $request->id_departemen;
        $ProdiList = Prodi::where('kode_departemen',$departemen)->get(['kode_prodi','nama','strata'])
        ->flatten();
        return response()->json(['prodi' => $ProdiList]);
    }

    public function getProdiByUser(Request $request)
    {
        // Retrieve the authenticated user
        $user = Auth::user();
        $dosen = $user->dosen; // Assuming User has a relationship with Dosen

        if ($dosen && $dosen->kode_departemen) {
            // Fetch prodi data for the user's kode_departemen
            $prodi = Prodi::where('kode_departemen', $dosen->kode_departemen)->get();
            // dd($prodi);
            return response()->json($prodi);
        }

        return response()->json(['error' => 'Departemen not found'], 404);
    }

}
