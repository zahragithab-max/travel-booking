<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    protected $fillable = [
        'name',
        'company',
        'origin',
        'departure_date',
        'destination',
        'wagon',
        'departure_time',
        'arrival_time',
        'duration',
        'price',
        'capacity',
        'available_seats',
        'is_active',

    ];

    protected $casts = [
        'price' => 'integer',
        'capacity' => 'integer',
        'available_seats' => 'integer',
        'is_active' => 'boolean',
    ];
}