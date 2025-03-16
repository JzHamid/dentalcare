<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'clinic_id',

        // OTP
        'fname',
        'mname',
        'lname',
        'birthdate',
        'gender',
        'phone',
        'email',
        'street_name',
        'city',
        'province',
        'postal_code',
        'password',
        'verified'
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
        ];
    }

    public function appointments()
    {
        return $this->hasMany(Appointments::class, 'user_id');
    }

    public function assignedClinics()
    {
        return $this->hasMany(Assign::class, 'user_id');
    }

    public function secretaryClinics()
    {
        return $this->hasMany(Assign::class, 'secretary_id');
    }

    public function healthRecords()
    {
        return $this->hasMany(HealthRecord::class, 'user_id');
    }
}
