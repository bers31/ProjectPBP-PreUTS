<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    // Define the table name if it's not following Laravel's naming convention
    protected $table = 'jadwal';

    // Define the primary key
    protected $primaryKey = 'id_jadwal';
    
    // Specify that the primary key is not incrementing (if it's a UUID or non-integer)
    public $incrementing = false;
    
    // Set the key type to string if using UUIDs or non-integer primary key
    protected $keyType = 'string';

    // Mass-assignable attributes
    protected $fillable = [
        'id_jadwal',
        'kode_mk',
        'jam_mulai',
        'jam_selesai',
        'kode_kelas',
        'ruang',
        'hari',
        'kuota',
    ];

    /**
     * Relationship with MataKuliah model.
     * Assumes that `kode_mk` in `jadwal` refers to `kode_mk` in `mata_kuliah`.
     */
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    }

    /**
     * Relationship with Ruang model.
     * Assumes that `ruang` in `jadwal` refers to `kode_ruang` in `ruang`.
     */
    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'ruang', 'kode_ruang');
    }
}
