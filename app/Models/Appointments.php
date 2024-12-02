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

    protected $casts = [
        'appointment_time' => 'datetime',
        'temporary' => 'array',
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function dentist () {
        return $this->belongsTo(User::class, 'dentist_id', 'id');
    }

    public function service () {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function clinic () {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }
}
