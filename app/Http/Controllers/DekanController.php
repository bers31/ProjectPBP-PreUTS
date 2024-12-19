<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\PendingRoomChange;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DekanController extends Controller
{
    public function dashboard(Request $request)
    {
        // Mengambil data strata
        $stratas = DB::table('prodi')
            ->select('strata')
            ->distinct()
            ->pluck('strata');

        // Mengambil data prodi dan mengelompokkannya
        $prodis = DB::table('prodi')->get();
        $prodiByStrata = $prodis->groupBy('strata');
        
        // Mendapatkan prodi yang dipilih
        $selectedProdi = $request->input('prodi');

        // Mengambil jadwal berdasarkan prodi
        $jadwals = $this->getFilteredJadwal($selectedProdi);

        // Mengambil perubahan ruangan yang pending
        $pendingRoomChanges = PendingRoomChange::where('approval_status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dekan.dashboard', compact(
            'pendingRoomChanges',
            'jadwals',
            'prodis',
            'stratas',
            'prodiByStrata',
            'selectedProdi'
        ));
    }

    private function getFilteredJadwal($selectedProdi)
    {
        return Jadwal::when($selectedProdi, function ($query) use ($selectedProdi) {
            $query->whereHas('mataKuliah', function ($query) use ($selectedProdi) {
                $query->where('kode_prodi', $selectedProdi);
            });
        })->get();
    }

    public function approve($id)
    {
        try {
            DB::beginTransaction();
            
            // Mengubah ini dari findOrFail menjadi first()
            $change = PendingRoomChange::where('id', $id)->first();
            
            if (!$change) {
                return $this->redirectWithError('Data perubahan ruang tidak ditemukan.');
            }

            $this->processRoomChange($change);
            $this->updateChangeStatus($change, 'approved');

            DB::commit();
            return $this->redirectWithSuccess('Perubahan ruang telah disetujui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->redirectWithError('Terjadi kesalahan saat memproses perubahan ruang: ' . $e->getMessage());
        }
    }

    private function processRoomChange(PendingRoomChange $change)
    {
        if ($change->new_data) {
            $newData = json_decode($change->new_data, true);

            switch($change->action_type) {
                case 'create':
                    Ruang::create($newData);
                    break;
                case 'update':
                    Ruang::where('kode_ruang', $change->kode_ruang)
                        ->update($newData);
                    break;
                case 'delete':
                    Ruang::where('kode_ruang', $change->kode_ruang)
                        ->delete();
                    break;
            }
        }
    }

    private function updateChangeStatus(PendingRoomChange $change, string $status)
    {
        $change->update([
            'approval_status' => $status,
            'approved_by' => Auth::id(),
            'approved_at' => now()
        ]);
    }

    public function reject($id)
    {
        try {
            // Mengubah ini juga dari findOrFail menjadi first()
            $change = PendingRoomChange::where('id', $id)->first();
            
            if (!$change) {
                return $this->redirectWithError('Data perubahan ruang tidak ditemukan.');
            }

            $this->updateChangeStatus($change, 'rejected');
            
            return $this->redirectWithSuccess('Perubahan ruang telah ditolak.');
        } catch (\Exception $e) {
            return $this->redirectWithError('Terjadi kesalahan saat menolak perubahan ruang: ' . $e->getMessage());
        }
    }

    public function approveAllRoomChanges(Request $request)
    {
        $changes = PendingRoomChange::all(); // Ambil semua perubahan yang belum disetujui
        foreach ($changes as $change) {
            $change->update([
                'approval_status' => 'approved',
                'approved_by' => Auth::id(),
                'approved_at' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Semua perubahan ruang telah disetujui.');
    }

    public function rejectAllRoomChanges(Request $request)
    {
        $changes = PendingRoomChange::all(); // Ambil semua perubahan yang belum disetujui
        foreach ($changes as $change) {
            $change->update([
                'approval_status' => 'rejected',
                'approved_by' => Auth::id(),
                'approved_at' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Semua perubahan ruang telah ditolak.');
    }


    public function setJadwal(Request $request)
    {
        try {
            $jadwal = Jadwal::findOrFail($request->input('id_jadwal'));
            $jadwal->update(['status' => 'Disetujui']);

            return $this->redirectWithSuccess('Jadwal berhasil ditetapkan.');
        } catch (\Exception $e) {
            return $this->redirectWithError('Terjadi kesalahan saat menetapkan jadwal.');
        }
    }

    public function setAllJadwal(Request $request)
    {
        try {
            $selectedProdi = $request->input('prodi');
            
            Jadwal::whereHas('mataKuliah', function ($query) use ($selectedProdi) {
                $query->where('kode_prodi', $selectedProdi);
            })->update(['status' => 'Disetujui']);

            return $this->redirectWithSuccess('Semua jadwal untuk prodi yang dipilih berhasil disetujui.');
        } catch (\Exception $e) {
            return $this->redirectWithError('Terjadi kesalahan saat menyetujui semua jadwal.');
        }
    }

    private function redirectWithSuccess($message)
    {
        return redirect()->back()->with('success', $message);
    }

    private function redirectWithError($message)
    {
        return redirect()->back()->with('error', $message);
    }
}