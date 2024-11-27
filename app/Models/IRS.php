<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IRS extends Model
{
    use HasFactory;
    protected $table ='irs';
    protected $primaryKey = 'id_irs';
    protected $fillable =[
        'id_irs', 'nim_mahasiswa', 'semester', 'kode_tahun', 'tanggal_pengisian', 'status'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim_mahasiswa', 'nim');
    }

    public function tahun(){
        return $this->belongsTo(Tahun::class, 'kode_tahun', 'kode_tahun');
    }

    public function detailIrs()
    {
        return $this->hasMany(DetailIRS::class, 'id_irs', 'id_irs');
    }
}
