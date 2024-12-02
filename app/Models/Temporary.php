<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temporary extends Model
{
    protected $table = 'fakeuser';

    protected $fillable = [
        'appointee_id',
        'fname',
        'mname',
        'lname',
        'email',
        'phone',
    ];
}
