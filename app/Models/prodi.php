<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'Prodi';
    protected $primaryKey = 'kode_prodi';
    public $incrementing = false; // Non-incrementing jika primary key bukan integer
    protected $keyType = 'string'; // Jika kode_fakultas adalah string, atur tipe key menjadi string

    // Tambahkan fillable untuk mass assignment
    protected $fillable = ['kode_prodi', 'nama'];

    public function mahasiswa(){
        return $this->hasMany(Mahasiswa::class, 'kode_prodi','kode_prodi');
    }

    public function departemen(){
        return $this->belongsTo(Departemen::class, 'kode_departemen', 'kode_departemen');
    }

    public function kaprodi(){
        return $thhis->hasMany(Kaprodi::class, 'kode_prodi', 'kode_prodi');
    }

}
