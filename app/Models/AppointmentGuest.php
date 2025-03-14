<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentGuest extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'name',
        'middlename',
        'lastname',
        'email',
        'contact',
        'sex',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointments::class, 'appointment_id');
    }
}
