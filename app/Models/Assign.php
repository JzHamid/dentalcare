<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    protected $table = 'available_dentist';

    protected $fillable = [
        'user_id', // Dentist's ID
        'clinic_id', // Clinic ID
        'secretary_id', // Secretary's ID
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function clinic () {
        return $this->belongsTo(Listing::class, 'clinic_id', 'id');
    }

    public function secretary () {
        return $this->belongsTo(User::class, 'secretary_id', 'id');
    }
}
    