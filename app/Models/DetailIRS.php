<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailIRS extends Model
{
    use HasFactory;
    protected $table = 'detail_irs';
    protected $primaryKey = 'id_irs';
    protected $fillable = ['id_irs', 'id_jadwal'];

    public function irs()
    {
        return $this->belongsTo(IRS::class, 'id_irs');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }
}
