<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceIssue extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'device_id',
        'lokasi_kolam',
        'jenis_error',
        'deskripsi',
        'status',
        'priority',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}