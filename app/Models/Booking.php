<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [

        'user_id',

        'flight_id',

        'train_id',

        'first_name',
        'last_name',

        'from',
        'to',

        'departure',
        'return_date',

        'passengers',

        'airline',

        'time',
        'arrival',

        'ticket_type',
        'seat',

        'price',

        'tracking_code',

    ];


    protected $casts = [

        'departure' => 'date',

        'return_date' => 'date',

    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function flight(): BelongsTo
    {
        return $this->belongsTo(Flight::class);
    }


    public function train(): BelongsTo
    {
        return $this->belongsTo(Train::class);
    }
}

