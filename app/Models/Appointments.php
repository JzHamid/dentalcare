<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable = [
        'user_id',
        'service_id',
        'listing_id',
        'appointment_time',
        'rescheduled_time',
        'status'
    ];
}
