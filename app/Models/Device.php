<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_id',
        'user_id',
        'kolam_id',
        'status',
        'last_sync',
    ];

    protected function casts(): array
    {
        return [
            'last_sync' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kolam()
    {
        return $this->belongsTo(Kolam::class);
    }
}