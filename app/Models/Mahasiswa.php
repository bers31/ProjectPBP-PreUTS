<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $fillable = [
        'nim',
        'nama',
        'email',
        'kode_prodi',
        'doswal',
    ];
    
    public function user() 
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'doswal', 'nidn');
    }

    public function historyRegistrasi()
    {
        return $this->hasMany(HistoryRegistrasi::class, 'nim', 'nim');
    }

    public function prodi(){
        return $this->belongsTo(Prodi::class,'kode_prodi','kode_prodi');
    }
}
