<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryRegistrasi extends Model
{
    use HasFactory;

    protected $table = 'history_registrasi';
    protected $fillable = [
        'nim', 
        'semester', 
        'tagihan', 
        'tanggal_bayar', 
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }
}
