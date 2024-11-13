<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'mata_kuliah', 'hari', 'jam_mulai', 'jam_selesai', 'ruang_kelas_id', 'status'
    ];

    // Relasi ke model RuangKelas
    public function ruangKelas()
    {
        return $this->belongsTo(RuangKelas::class);
    }
}