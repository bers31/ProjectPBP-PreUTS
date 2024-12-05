<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';

    protected $primaryKey = 'kode_mk';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'semester',
        'sks',
        'kurikulum',
        'kode_prodi',
        'sifat',
    ];

    private function getStatusPengambilan($nim, $idMataKuliah)
    {
        // Ambil data KHS mahasiswa
        $khs = KHS::where('nim', $nim)
            ->where('kode_mk', $idMataKuliah)
            ->orderBy('semester_ambil', 'desc') // Prioritaskan semester terbaru
            ->first();

        if (!$khs) {
            return 'Baru'; // Default jika tidak ada data KHS
        }

        // Logika status pengambilan
        if ($khs->nilai < 60) {
            return 'Mengulang';
        } elseif ($khs->nilai >= 60 && $khs->nilai < 80) {
            return 'Perbaikan';
        } else {
            return 'Baru';
        }
    }

    /**
     * Relationship with Jadwal model.
     */
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'kode_mk', 'kode_mk');
    }
}
