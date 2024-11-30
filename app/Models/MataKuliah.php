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
    public function getRouteKeyName()
    {
        return 'kode_mk'; // Use kode_mk for route model binding
    }

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'semester',
        'sks',
        'kurikulum',
        'kode_prodi',
        'sifat',
    ];

    /**
     * Relationship with Jadwal model.
     */
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'kode_mk', 'kode_mk');
    }
}
