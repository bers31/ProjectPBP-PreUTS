<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DosenPengampu extends Model
{
    protected $table = 'dosen_pengampu';
    protected $primaryKey = null; // No single primary key
    public $incrementing = false; // No auto-increment
    protected $fillable = ['nidn_dosen', 'id_jadwal'];

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class,  'nidn_dosen', 'nidn');
    }

    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id_jadwal');
    }
}
