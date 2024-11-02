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
        'fakultas',
        'departemen',
        'nip_doswal',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'nip_doswal', 'nip');
    }

    public function historyRegistrasi()
    {
        return $this->hasMany(HistoryRegistrasi::class, 'nim', 'nim');
    }
}
