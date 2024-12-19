<?php

namespace App\Http\Controllers;

use App\Models\Ruang;

class AkademikController extends Controller
{
    /**
     * Menampilkan Dashboard Akademik.
     */
    public function index()
    {
        $Ruang = Ruang::count();

        return view('akademik.dashboard', compact('Ruang'));
    }

}