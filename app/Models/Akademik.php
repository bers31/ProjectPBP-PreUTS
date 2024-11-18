<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Akademik extends Model
{
    protected $table = 'akademik';
    protected $primaryKey = 'nidn';
    protected $fillable = ['nidn', 'nama', 'email', 'fakultas'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ruang(): HasMany
    {
        return $this->hasMany(ruang::class, 'akademik_id');
    }
}
