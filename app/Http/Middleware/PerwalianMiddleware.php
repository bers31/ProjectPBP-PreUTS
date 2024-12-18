<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class PerwalianMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect('login')->with('error', 'Anda harus login terlebih dahulu');
        }

        // Ambil data mahasiswa berdasarkan NIM dari route
        $nim = $request->route('nim');
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        // Jika mahasiswa tidak ditemukan
        if (!$mahasiswa) {
            return abort(404, 'Mahasiswa tidak ditemukan');
        }

        // Dapatkan user yang sedang login
        $currentUser = Auth::user();

        // Pastikan user adalah dosen dan dosen wali dari mahasiswa tersebut
        if ($currentUser->role !== 'dosen' || !$currentUser->dosen || $mahasiswa->doswal !== $currentUser->dosen->nidn) {
            return abort(403, 'Anda tidak diizinkan untuk mengakses data mahasiswa ini');
        }

        // Lanjutkan request ke controller
        return $next($request);
    }
}
