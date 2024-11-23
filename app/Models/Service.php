<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'clinic_id',
        'name',
        'description',
        'duration',
        'price',
    ];

    public function availabilities () {
        return $this->hasMany(Available::class, 'service_id', 'id');
    }
}
