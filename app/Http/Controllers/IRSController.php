<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailIRS;
use App\Models\IRS;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class IRSController extends Controller
{
    // Display IRS page for a specific Mahasiswa
    public function index(Request $request)
    {
        // Get mahasiswa
        $mahasiswa = Auth::user()->mahasiswa;
        $nim = $mahasiswa->nim;
    
        // Menampilkan matkul sesuai semester mahasiswa
        $semesterMHS = Mahasiswa::where('nim', $nim)->value('semester');
        $irs = IRS::where('nim_mahasiswa', $nim)->where('semester',$semesterMHS)->first();

        // Get all Mata Kuliah for the semester
        $mataKuliah = MataKuliah::where('semester', $semesterMHS)->get();
    
        // Get all Jadwal based on Mata Kuliah kode_mk
        $jadwals = Jadwal::whereIn('kode_mk', $mataKuliah->pluck('kode_mk'))->get();
    
        // Menampilkan jadwal tambahan
        $isGanjil = $semesterMHS % 2 !== 0;

        $mkTambahan = MataKuliah::whereRaw('semester % 2 = ?', [$isGanjil ? 1 : 0])
                                ->where('semester', '!=', $semesterMHS)
                                ->get();

        // // Tambahkan mk yang sudah dipilih
        // $selectedMKs = session()->get('selectedMKs', collect());

        // // Tambahkan jadwal berdasarkan mk yg dipilih
        // $selectedJadwals = Jadwal::whereIn('kode_mk', collect($selectedMKs)->pluck('kode_mk'))->get();
        
        // // Tambahkan jadwal tambahan dari session
        // // $selectedJadwals = session()->get('selectedJadwals', collect());
        // $jadwals = $jadwals->merge($selectedJadwals);
        
        // Ambil mata kuliah yang sudah dipilih dari cookie
        $selectedMKs = collect(json_decode(Cookie::get("selectedMKs_user_{$nim}", '[]'), true));

        // Tambahkan jadwal berdasarkan mata kuliah yang dipilih
        $selectedJadwals = Jadwal::whereIn('kode_mk', $selectedMKs->pluck('kode_mk'))->get();

        // Gabungkan dengan jadwal yang ada
        $jadwals = $jadwals->merge($selectedJadwals);

        // Get all the detail IRS entries for this IRS
        $detailIrs = DetailIrs::where('id_irs', $irs->id_irs)->get();
    
        // Mengambil IRS terbaru
        $latestIrs = $mahasiswa->irs()->latest()->first();
    
        // Calculate total SKS
        $totalSKS = $detailIrs->sum(function ($detail) {
            return $detail->jadwal->mataKuliah->sks ?? 0;
        });
    
        return view('mahasiswa.irs_mhs', compact('irs', 'jadwals', 'selectedMKs', 'mataKuliah', 'mkTambahan', 'detailIrs', 'latestIrs', 'totalSKS'));
    }


    // Add jadwal to detail IRS
    public function add(Request $request)
    {
        $request->validate([
            'id_irs' => 'required|exists:irs,id_irs', // Ensure the IRS ID exists in the IRS table
            'id_jadwal' => 'required|exists:jadwal,id_jadwal', // Ensure the Jadwal ID exists in the Jadwal table
        ]);

        $id_jadwal = $request->id_jadwal;
        $id_irs = $request->id_irs;

        // get mk
        $kode_mk = Jadwal::where('id_jadwal', $id_jadwal)->value('kode_mk');

        // check mk
        $existsMK = DetailIrs::where('id_irs', $id_irs)
            ->whereHas('jadwal', function ($query) use ($kode_mk, $id_jadwal) {
                $query->where('kode_mk', $kode_mk)
                    ->where('id_jadwal', '!=', $id_jadwal); // Pastikan id_jadwal berbeda
            })
            ->exists();

        if ($existsMK) {
            return redirect()->back()->with('error', 'Mata kuliah sudah diambil di jadwal lain!');
        }

        // check jadwal
        $existsJadwal = DetailIrs::where('id_irs', $id_irs)
            ->where('id_jadwal', $id_jadwal)
            ->exists();

        if ($existsJadwal) {
            return redirect()->back()->with('error', 'Jadwal sudah ada!');
        }

        // Add jadwal to detail_irs
        DetailIrs::create([
            'id_irs' => $id_irs,
            'id_jadwal' => $id_jadwal,
        ]);

        return redirect()->route('mahasiswa.irs_mhs')->with('success', 'Jadwal berhasil ditambahkan!');
    }


    public function delete(Request $request)
    {   
        // Validate the incoming request
        $request->validate([
            'id_irs' => 'required|exists:detail_irs,id_irs',
            'id_jadwal' => 'required|exists:detail_irs,id_jadwal',
        ]);
    
        // Find the record based on id_irs and id_jadwal
        $detailIrs = DetailIrs::where('id_irs', $request->id_irs)
            ->where('id_jadwal', $request->id_jadwal)
            ->first();

        // Delete the record
        $detailIrs->delete();
    
        // Redirect back with a success message
        return redirect()->route('mahasiswa.irs_mhs')->with('success', 'Jadwal berhasil dihapus!');
    }
    
    // public function updateMK(Request $request)
    // {
    //     // Validasi input
    //     $validated = $request->validate([
    //         'action' => 'required|in:add,remove',
    //         'selectedMK' => 'required|array',
    //         'selectedMK.*.id' => 'exists:mata_kuliah,kode_mk',
    //     ]);
    
    //     // Ambil jadwal tambahan yang dipilih
    //     $selectedMKIds = collect($validated['selectedMK'])->pluck('id')->toArray();
    //     $selectedMKs = MataKuliah::whereIn('kode_mk', $selectedMKIds)->get();
    //     // $selectedJadwals = Jadwal::whereIn('id_jadwal', $selectedJadwalIds)->get();
    
    //     // Ambil jadwal yang sudah ada di session
    //     $existingMKs = session('selectedMKs', collect([]));
    
    //     if ($validated['action'] === 'add') {
    //         // Gabungkan dengan jadwal yang sudah ada di session sebelumnya
    //         $mergedMKs = $existingMKs->merge($selectedMKs);
    //         $message = 'Jadwal berhasil ditambahkan!';
    //     } else {
    //         // Hapus jadwal yang dipilih
    //         $mergedMKs = $existingMKs->reject(function ($mataKuliah) use ($selectedMKIds) {
    //             return in_array($mataKuliah->kode_mk, $selectedMKIds);
    //         });
    //         $message = 'Jadwal berhasil dihapus!';
    //     }
    
    //     // Simpan jadwal tambahan ke session
    //     session()->put('selectedMKs', $mergedMKs);
    
    //     // Redirect dengan flash message
    //     return redirect()->route('mahasiswa.irs_mhs')->with('success', $message);
    // }



    // public function updateMK(Request $request)
    // {
    //     // Validasi input
    //     $validated = $request->validate([
    //         'action' => 'required|in:add,remove',
    //         'selectedMK' => 'required|array',
    //         'selectedMK.*.id' => 'exists:mata_kuliah,kode_mk',
    //     ]);

    //     // Ambil data mata kuliah yang dipilih
    //     $selectedMKIds = collect($validated['selectedMK'])->pluck('id')->toArray();
    //     $selectedMKs = MataKuliah::whereIn('kode_mk', $selectedMKIds)->get();

    //     // Ambil data mata kuliah yang disimpan di cookie
    //     $existingMKs = json_decode(Cookie::get('selectedMKs', '[]'), true);

    //     if ($validated['action'] === 'add') {
    //         // Gabungkan data baru dengan data lama
    //         $mergedMKs = collect($existingMKs)->merge($selectedMKs)->unique('kode_mk')->values();
    //         $message = 'Mata kuliah berhasil ditambahkan!';
    //     } else {
    //         // Hapus mata kuliah yang dipilih
    //         $mergedMKs = collect($existingMKs)->reject(function ($mataKuliah) use ($selectedMKIds) {
    //             return in_array($mataKuliah['kode_mk'], $selectedMKIds);
    //         });
    //         $message = 'Mata kuliah berhasil dihapus!';
    //     }

    //     // Simpan data ke cookie
    //     Cookie::queue('selectedMKs', $mergedMKs->toJson(), 1440); // Simpan selama 1 hari (1440 menit)

    //     // Redirect dengan flash message
    //     return redirect()->route('mahasiswa.irs_mhs')->with('success', $message);
    // }    


    public function updateMK(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'action' => 'required|in:add,remove',
            'selectedMK' => 'required|array',
            'selectedMK.*.id' => 'exists:mata_kuliah,kode_mk',
        ]);

        // Dapatkan ID pengguna
        $mahasiswa = Auth::user()->mahasiswa;
        $nim = $mahasiswa->nim;

        // Nama cookie unik per pengguna
        $cookieName = "selectedMKs_user_{$nim}";

        // Ambil data mata kuliah yang dipilih
        $selectedMKIds = collect($validated['selectedMK'])->pluck('id')->toArray();
        $selectedMKs = MataKuliah::whereIn('kode_mk', $selectedMKIds)->get();

        // Ambil data mata kuliah yang disimpan di cookie
        $existingMKs = json_decode(Cookie::get($cookieName, '[]'), true);

        if ($validated['action'] === 'add') {
            // Gabungkan data baru dengan data lama
            $mergedMKs = collect($existingMKs)->merge($selectedMKs)->unique('kode_mk')->values();
            $message = 'Mata kuliah berhasil ditambahkan!';
        } else {
            // Hapus mata kuliah yang dipilih
            $mergedMKs = collect($existingMKs)->reject(function ($mataKuliah) use ($selectedMKIds) {
                return in_array($mataKuliah['kode_mk'], $selectedMKIds);
            });
            $message = 'Mata kuliah berhasil dihapus!';
        }

        // Hitung durasi dalam detik untuk 30 hari
        $oneMonth = 30 * 24 * 60 * 60;

        // Simpan cookie selama satu bulan
        Cookie::queue($cookieName, $mergedMKs->toJson(), $oneMonth);

        // Redirect dengan flash message
        return redirect()->route('mahasiswa.irs_mhs')->with('success', $message);
    }


}
