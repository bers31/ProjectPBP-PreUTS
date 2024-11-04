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
}