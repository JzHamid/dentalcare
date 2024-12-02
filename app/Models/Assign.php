<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    protected $table = 'available_dentist';

    protected $fillable = [
        'user_id',
        'clinic_id',
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function clinic () {
        return $this->belongsTo(Listing::class, 'clinic_id', 'id');
    }
}
