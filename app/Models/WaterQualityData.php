<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterQualityData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kolam_id',
        'ph',
        'suhu',
        'tds',
        'ec',
        'tanggal',
        'jam',
        'source',
        'catatan',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'ph' => 'decimal:2',
            'suhu' => 'decimal:2',
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