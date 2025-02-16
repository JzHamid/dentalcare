<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'amount_paid',
        'payment_type',
        'remaining_balance',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointments::class);
    }
}
