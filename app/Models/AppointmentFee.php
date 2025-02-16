<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointments_id',
        'fee_type',
        'fee_amount',
        'discount_percentage',
        'service_name',
        'service_amount',
        'service_discount',
    ];

    public function appointment()
    {
        return $this->belongsTo(\App\Models\Appointments::class);
    }

    public function getDiscountedAmountAttribute()
    {
        return $this->fee_amount - ($this->fee_amount * ($this->discount_percentage / 100));
    }
}
