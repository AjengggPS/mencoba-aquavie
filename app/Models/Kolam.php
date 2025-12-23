<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kolam extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_kolam',
        'lokasi',
        'deskripsi',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function waterQualityData()
    {
        return $this->hasMany(WaterQualityData::class);
    }

    public function device()
    {
        return $this->hasOne(Device::class);
    }
}