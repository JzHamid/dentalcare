<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointments extends Model
{
    protected $fillable = [
        'user_id',
        'service_id',
        'listing_id',
        'appointment_time',
        'rescheduled_time',
        'reschedule_reason',
        'status',
        'dentist_id',
        'temporary',
        'procedure_notes',
    ];

    protected $casts = [
        'appointment_time' => 'datetime',
        'temporary' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function dentist()
    {
        return $this->belongsTo(User::class, 'dentist_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function clinic()
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }

    public function additional_fee()
    {
        return $this->hasOne(\App\Models\AppointmentFee::class);
    }

    public function fees()
    {
        return $this->hasMany(\App\Models\AppointmentFee::class, 'appointments_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'appointment_id', 'id');
    }

    public function getTotalPaidAttribute()
    {
        return $this->payments()->sum('amount_paid');
    }

    public function getRemainingBalanceAttribute()
    {
        return $this->fees()->sum('fee_amount') - $this->getTotalPaidAttribute();
    }

    public function guest()
    {
        return $this->hasOne(AppointmentGuest::class, 'appointment_id');
    }
}
