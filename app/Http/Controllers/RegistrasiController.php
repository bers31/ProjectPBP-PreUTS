<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\HistoryRegistrasi;
use App\Models\IRS;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrasiController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::user()->mahasiswa;
        $historyRegistrasi = HistoryRegistrasi::where('nim', $mahasiswa->nim)->get();
    
        return view('mahasiswa.registrasi_mhs', compact('mahasiswa', 'historyRegistrasi'));
    }

    public function getRegistrasiData(Request $request)
    {
        $mahasiswa = Auth::user()->mahasiswa;

        // Update status to 'aktif' if it is currently 'non-aktif'
        if ($mahasiswa->status != 'aktif') {
            $mahasiswa->status = 'aktif';
            $mahasiswa->save();
            $tahun_akademik = Tahun::where('status','aktif')->value('kode_tahun');
            IRS::firstOrCreate(
                [
                    'nim_mahasiswa' => $mahasiswa->nim,
                    'semester' => $mahasiswa->semester,
                    'kode_tahun' => $tahun_akademik,
                ]
            );
    
            // Calculate tagihan based on gol_ukt
            $tagihanMap = [
                '1' => 1000000,
                '2' => 2000000,
                '3' => 3000000,
                '4' => 4000000,
                '5' => 5000000,
                '6' => 6000000,
                '7' => 7000000,
                '8' => 8000000,
            ];
            $tagihan = $tagihanMap[$mahasiswa->gol_ukt] ?? 0;

            // Tambahkan data ke tabel history_registrasi
            $historyRegistrasi = HistoryRegistrasi::create([
                'nim' => $mahasiswa->nim,
                'semester' => $mahasiswa->semester,
                'tagihan' => $tagihan,
                'tanggal_bayar' => now(),
            ]);

            // Return data untuk ditampilkan pada view
            return response()->json([
                'semester' => $historyRegistrasi->semester,
                'tagihan' => $historyRegistrasi->tagihan,
                'tanggal_bayar' => $historyRegistrasi->tanggal_bayar->format('Y-m-d H:i:s'),
            ]);
        } else {
            return response()->json(['message' => 'Mahasiswa sudah aktif'], 400);
        }
    }
}     
