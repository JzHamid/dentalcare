<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Available extends Model
{
    protected $table = 'service_available';

    protected $fillable = [
        'listing_id',
        'service_id',
    ];

    public function service () {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function listing () {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }
}
