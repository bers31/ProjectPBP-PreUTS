<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;
    protected $table = 'Departemen';
    protected $primaryKey = 'kode_departemen';
    public $incrementing = false; // Non-incrementing jika primary key bukan integer
    protected $keyType = 'string'; // Jika kode_fakultas adalah string, atur tipe key menjadi string

    // Tambahkan fillable untuk mass assignment
    protected $fillable = ['kode_departemen', 'nama'];

    public function fakultas(){
        return $this->belongsTo(Fakultas::class, 'kode_fakultas', 'kode_fakultas');
    }

    public function prodi(){
        return $this->hasMany(Prodi::class, 'kode_departemen', 'kode_departemen');
    }
}
