<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    public $incrementing = false; // Jika 'nim' bukan auto-increment
    protected $keyType = 'string'; // Jika 'nim' bukan integer
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

    public function irs()
    {
        return $this->hasMany(IRS::class, 'nim_mahasiswa', 'nim');
    }

    public function detailIrs()
    {
        return $this->hasManyThrough(DetailIRS::class, IRS::class);
    }
}
