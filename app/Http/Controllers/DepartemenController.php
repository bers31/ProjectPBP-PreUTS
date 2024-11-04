<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    //
    public function fetchDepartemen(Request $request){
        $fakultas = $request->id_fakultas;
        $DepartemenList = Departemen::where('kode_fakultas',$fakultas)->get(['kode_departemen','nama'])
        ->flatten();
        return response()->json(['departemen' => $DepartemenList]);
    }
}
