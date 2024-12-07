<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KuliahOnlineController extends Controller
{
    /**
     * Menampilkan halaman kuliah online.
     */
    public function index()
    {
        $dosen = Auth::user()->dosen;
        return view('dosen.kuliahonline', ['dosen' => $dosen]);
    }

    /**
     * Mulai perkuliahan online
     */
    public function startOnlineClass(Request $request)
    {
        $dosen = Auth::user()->dosen;
        
        // Periksa status perkuliahan
        $dosen->status_perkuliahan = 'sedang berlangsung';
        $dosen->save();
    
        return response()->json([
            'success' => true,
            'message' => 'Perkuliahan online dimulai'
        ]);
    }
}