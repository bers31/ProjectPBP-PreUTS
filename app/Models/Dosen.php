<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $primaryKey = 'nidn';
    public $incrementing = false; // Non-incrementing jika primary key bukan integer
    protected $keyType = 'string'; // Jika kode_fakultas adalah string, atur tipe key menjadi string
    protected $fillable = [
        'nidn',
        'email',
        'nama',
        'kode_departemen',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function mahasiswa(){
        return $this->hasMany(Mahasiswa::class, 'doswal', 'nidn');
    }

    public function dekan(){
        return $this->hasOne(Dekan::class, 'nidn', 'nidn');
    }

    public function departemen(){
        return $this->hasOne(Departemen::class, 'kode_departemen','kode_departemen');
    }

    public function kaprodi(){
        return $this->hasOne(Kaprodi::class, 'nidn', 'nidn');
    }
}
