<?php

namespace App\Models;
use \App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dekan extends Model
{
    use HasFactory;
    protected $table = 'dekan';
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

    public function dosen(){
        return $this-> hasOne(Dosen::class, 'nidn', 'nidn');
    }
}