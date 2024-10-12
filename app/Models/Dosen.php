<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $primaryKey = 'nip';
    protected $fillable = [
        'nip',
        'email',
        'nama',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function mahasiswa(){
        return $this->hasMany(Mahasiswa::class, 'nip_doswal', 'nip');
    }
}
