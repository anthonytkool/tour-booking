<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'name',
        'description',
        'region',
        'duration_days',
        'price',
        'min_people',
    ];

    protected $casts = [
        'available_dates' => 'array',
    ];
    
}
