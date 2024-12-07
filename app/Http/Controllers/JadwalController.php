<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use Illuminate\Http\Request;
use App\Models\MataKuliah;
use App\Models\Dosen;
use App\Models\Ruang;
use App\Models\DosenPengampu;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function jadwalMahasiswa()
     {
        $jadwal = Jadwal::with('mataKuliah')
        ->whereHas('mataKuliah', function ($query) {
            $query->where('status', 'disetujui'); 
        })
        ->orderBy('hari')
        ->orderBy('jam_mulai')
        ->get();    
         return view('mahasiswa.jadwal_mhs', compact('jadwal'));
     }
     
    public function index()
    {
        $jadwals = Jadwal::with(['mataKuliah', 'dosen_pengampu.dosen', 'ruangan'])
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        // dd($jadwals);

    
        return view('kaprodi.jadwal.index', compact('jadwals'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $dosun = $user->dosen; // Assuming User has a relationship with Dosen
    
        if (!$dosun || !$dosun->kode_departemen) {
            abort(403, 'User does not have a valid kode_departemen.');
        }
    
        $matkul = MataKuliah::all();
        $dosen = Dosen::all();
        $ruang = Ruang::where('kode_departemen', $dosun->kode_departemen)
                ->where('status_ketersediaan', 'Tersedia')
                ->get(['kode_ruang', 'kapasitas']);
    
    
        $jadwals = Jadwal::with(['dosen_pengampu.dosen'])
            ->select('id_jadwal', 'kode_mk', 'kode_kelas', 'hari', 'ruang', 'jam_mulai', 'jam_selesai')
            ->get();
    
        $schedules = $jadwals->map(function ($jadwal) {
            return [
                'id_jadwal' => $jadwal->id_jadwal,
                'kode_mk' => $jadwal->kode_mk,
                'kode_kelas' => $jadwal->kode_kelas,
                'hari' => $jadwal->hari,
                'ruang' => $jadwal->ruang,
                'jam_mulai' => $jadwal->jam_mulai,
                'jam_selesai' => $jadwal->jam_selesai,
                'dosen_pengampu' => $jadwal->dosen_pengampu->map(fn($dp) => $dp->dosen->nidn)->filter(),
            ];
        });
    
        return view('kaprodi.jadwal.create', compact('matkul', 'dosen', 'ruang', 'jadwals', 'schedules'));
    }
    
    
    
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJadwalRequest $request)
    {
        // Step 1: Validate the incoming data
        $validated = $request->validated();

        // dd($request->all());

        // Step 2: Create a new Jadwal record
        $jadwal = Jadwal::create([
            'kode_mk' => $validated['kode_mk'],
            'kode_kelas' => $validated['kode_kelas'],
            'hari' => $validated['hari'],
            'ruang' => $validated['ruang'],
            'jam_mulai' => $validated['jam_mulai'],
            'jam_selesai' => $validated['jam_selesai'],
            'kuota' => $validated['kuota'],
        ]);

    
        $dosenPengampu = json_decode($validated['dosen_pengampu'], true);

        // Check if decoding succeeded and iterate over the array
        if (is_array($dosenPengampu)) {
            foreach ($dosenPengampu as $nidn) {
                DosenPengampu::create([
                    'id_jadwal' => $jadwal->id_jadwal,
                    'nidn_dosen' => $nidn,
                ]);
            }
        } else {
            // Handle the case where decoding fails (optional)
            return redirect()->back()->withErrors(['dosen_pengampu' => 'Invalid data format for dosen_pengampu.']);
        }
    
        // Step 4: Redirect or return a response
        return redirect()->route('jadwal.index')->with('success', 'Jadwal created successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        $user = Auth::user();
        $dosun = $user->dosen; // Assuming User has a relationship with Dosen
    
        if (!$dosun || !$dosun->kode_departemen) {
            abort(403, 'User does not have a valid kode_departemen.');
        }
    
        $matkul = MataKuliah::all();
        $dosen = Dosen::all();
        $ruang = Ruang::where('kode_departemen', $dosun->kode_departemen)
            ->get(['kode_ruang', 'kapasitas']); // Include kapasitas in the query
            
        $jadwul = Jadwal::all();

    
        // Fetch existing schedules with related dosen_pengampu and dosen details
        $jadwals = Jadwal::with(['dosen_pengampu.dosen']) // Load dosen details through dosen_pengampu
            ->select('id_jadwal', 'kode_mk', 'kode_kelas', 'hari', 'ruang', 'jam_mulai', 'jam_selesai')
            ->get();
    
        // Prepare data for scheduling logic
        $schedules = Jadwal::with(['dosen_pengampu.dosen']) // Ensure relationships are loaded
            ->get()
            ->map(function ($jadwal) {
                return [
                    'id_jadwal' => $jadwal->id_jadwal,
                    'kode_mk' => $jadwal->kode_mk,
                    'kode_kelas' => $jadwal->kode_kelas,
                    'hari' => $jadwal->hari,
                    'ruang' => $jadwal->ruang,
                    'jam_mulai' => $jadwal->jam_mulai,
                    'jam_selesai' => $jadwal->jam_selesai,
                    'dosen_pengampu' => $jadwal->dosen_pengampu->map(function ($dp) {
                        return $dp->dosen->nidn ?? null; // Safely retrieve nidn of each dosen
                    })->filter(), // Remove null values
                ];
            });
    
        // dd($jadwal);
        // dd($matkul, $dosen, $ruang, $jadwals, $schedules, $jadwal);
        return view('kaprodi.jadwal.edit', compact('matkul', 'dosen', 'ruang', 'jadwals', 'schedules', 'jadwal'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {

        
        $validated = $request->validated();
        // dd($request);

        // Step 1: Update the `jadwal` record
        $jadwal->update([
            'kode_mk' => $validated['kode_mk'],
            'kode_kelas' => $validated['kode_kelas'],
            'hari' => $validated['hari'],
            'ruang' => $validated['ruang'],
            'jam_mulai' => $validated['jam_mulai'],
            'jam_selesai' => $validated['jam_selesai'],
            'kuota' => $validated['kuota'],
        ]);
    
        // Step 2: Synchronize `dosen_pengampu` records
        $newDosenPengampu = json_decode($validated['dosen_pengampu'], true); // New set of NIDNs
    
        if (is_array($newDosenPengampu)) {
            // Get current `dosen_pengampu` for this `jadwal`
            $existingDosenPengampu = $jadwal->dosen_pengampu()->pluck('nidn_dosen')->toArray();
    
            // Find dosen_pengampu records to delete
            $toDelete = array_diff($existingDosenPengampu, $newDosenPengampu);
            if (!empty($toDelete)) {
                DosenPengampu::where('id_jadwal', $jadwal->id_jadwal)
                    ->whereIn('nidn_dosen', $toDelete)
                    ->delete();
            }
    
            // Find dosen_pengampu records to add
            $toAdd = array_diff($newDosenPengampu, $existingDosenPengampu);
            foreach ($toAdd as $nidn) {
                DosenPengampu::create([
                    'id_jadwal' => $jadwal->id_jadwal,
                    'nidn_dosen' => $nidn,
                ]);
            }
        } else {
            // Handle invalid data format for dosen_pengampu
            return redirect()->back()->withErrors(['dosen_pengampu' => 'Invalid data format for dosen_pengampu.']);
        }
    
        return redirect()->route('jadwal.index')->with('success', 'Jadwal and associated Dosen Pengampu updated successfully!');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        try {
            // Step 1: Delete related DosenPengampu records
            $jadwal->dosen_pengampu()->delete(); // Assumes the relationship is defined in the Jadwal model
    
            // Step 2: Delete the Jadwal record itself
            $jadwal->delete();
    
            return redirect()->route('jadwal.index')->with('success', 'Jadwal and related records deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('jadwal.index')->with('error', 'Failed to delete Jadwal: ' . $e->getMessage());
        }
    }
    
    

    public function storeTemp(Request $request)
    {
        $newSchedules = [];
        $banyak_kelas = (int)$request->input('banyak_kelas');
        $kode_kelas_start = 'A';
    
        for ($i = 0; $i < $banyak_kelas; $i++) {
            $newSchedules[] = [
                'kode_mk' => $request->kode_mk,
                'kode_kelas' => chr(ord($kode_kelas_start) + $i),
                'kuota' => $request->kuota,
                'dosen_pengampu' => $request->dosen_pengampu,
            ];
        }
    
        session()->put('new_schedules', $newSchedules);
    
        return redirect()->route('jadwal.index');
    }

    public function saveChanges(Request $request)
    {
        $validatedData = $request->validate([
            'jadwals' => 'required|array',
            'jadwals.*.id_jadwal' => 'exists:jadwal,id_jadwal',
            'jadwals.*.jam_mulai' => 'nullable|date_format:H:i',
            'jadwals.*.jam_selesai' => 'nullable|date_format:H:i|after:jadwals.*.jam_mulai',
            'jadwals.*.hari' => 'nullable|string',
            'jadwals.*.ruang' => 'nullable|exists:ruang,kode_ruang',
        ]);
    
        foreach ($validatedData['jadwals'] as $updateData) {
            $jadwal = Jadwal::find($updateData['id_jadwal']);
            $jadwal->update($updateData);
        }
    
        return redirect()->route('jadwal.index')->with('success', 'Jadwal updated successfully!');
    }
    
    public function fetchDosen(Request $request)
    {
        $kodeProdi = $request->kode_prodi;
    

    
        $dosen = Dosen::whereHas('departemen', function ($query) use ($kodeProdi) {
            $query->whereHas('prodi', function ($subQuery) use ($kodeProdi) {
                $subQuery->where('kode_prodi', $kodeProdi);
            });
        })->get();
    
        return response()->json(['dosen' => $dosen]);
    }
    
    
    
}
