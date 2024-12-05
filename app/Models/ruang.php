<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruang extends Model
{
    use HasFactory;

    protected $table = 'ruang';
    protected $primaryKey = 'kode_ruang';
    public $incrementing = false; // Disable auto-incrementing
    protected $keyType = 'string'; // Set primary key type to string
    protected $fillable = [
        'kode_ruang',
        'kode_departemen', 
        'kapasitas', 
        'status_ketersediaan'
    ];

    /**
     * Relasi Ruang terhadap fakultas
     */
    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'kode_departemen', 'kode_departemen');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'kode_ruang', 'ruang');
    }
    
}
