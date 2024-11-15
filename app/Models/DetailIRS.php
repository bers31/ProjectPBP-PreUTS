<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailIRS extends Model
{
    use HasFactory;
    protected $table = 'detail_irs';
    protected $fillable = ['irs_id', 'jadwal_id'];
    public function irs()
    {
        return $this->belongsTo(IRS::class, 'irs_id');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }
}
