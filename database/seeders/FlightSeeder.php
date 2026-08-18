<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Flight;

class FlightSeeder extends Seeder
{
    public function run(): void
    {
        Flight::create([
            'airline' => 'ایران ایر',
            'origin' => 'تهران',
            'destination' => 'مشهد',
            'departure_time' => '08:30',
            'active' => true,
        ]);

        Flight::create([
            'airline' => 'ماهان',
            'origin' => 'تهران',
            'destination' => 'شیراز',
            'departure_time' => '11:45',
            'active' => true,
        ]);

        Flight::create([
            'airline' => 'وارش',
            'origin' => 'تهران',
            'destination' => 'رشت',
            'departure_time' => '16:20',
            'active' => false,
        ]);
    }
}
