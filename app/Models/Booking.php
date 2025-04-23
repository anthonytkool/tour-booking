<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'travel_date',
        'number_of_people',
        'customer_name',
        'customer_email',
        'customer_phone',
        'payment_status',
    ];
}
