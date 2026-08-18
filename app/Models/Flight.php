<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'airline',
        'flight_number',
        'origin',
        'destination',
        'flight_date',
        'departure_time',
        'arrival_time',
        'price',
        'vip_price',
        'capacity',
        'available_seats',
        'flight_class',
        'active',
    ];
}