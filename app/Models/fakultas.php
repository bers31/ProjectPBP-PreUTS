<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $table = 'Fakultas'; // Nama tabel sesuai dengan tabel database Anda
    protected $primaryKey = 'kode_fakultas'; // Nama kolom primary key
    public $incrementing = false; // Non-incrementing jika primary key bukan integer
    protected $keyType = 'string'; // Jika kode_fakultas adalah string, atur tipe key menjadi string

    // Tambahkan fillable untuk mass assignment
    protected $fillable = ['kode_fakultas', 'nama_fakultas'];

    public function departemen(){
        return $this->hasMany(Departemen::class, 'kode_fakultas', 'kode_fakultas');
    }

    public function ruang()
    {
        return $this->hasMany(Ruang::class, 'kode_fakultas', 'kode_fakultas');
    }
}
