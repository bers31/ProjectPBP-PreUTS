<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingRoomChange extends Model
{
    protected $fillable = [
        'action_type',
        'kode_ruang',
        'kode_departemen',
        'kode_prodi',
        'kapasitas',
        'status_ketersediaan',
        'old_data',
        'new_data',
        'approval_status',
        'created_by',
        'approved_by',
        'approved_at'
    ];

    protected $casts = [
        'old_data' => 'array',
        'new_data' => 'array',
        'approved_at' => 'datetime',
    ];
}