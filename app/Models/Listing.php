<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $table = 'clinic';

    protected $fillable = [
        'name',
        'email',
        'contact',
        'location',
    ];

    public function availabilities()
    {
        return $this->hasMany(Available::class, 'listing_id', 'id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'clinic_id', 'id');
    }
}
