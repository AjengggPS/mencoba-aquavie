<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'city',
        'address',
        'has_device',
        'device_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'has_device' => 'boolean',
        ];
    }

    // Relationships
    public function kolams()
    {
        return $this->hasMany(Kolam::class);
    }

    public function waterQualityData()
    {
        return $this->hasMany(WaterQualityData::class);
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function deviceIssues()
    {
        return $this->hasMany(DeviceIssue::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}