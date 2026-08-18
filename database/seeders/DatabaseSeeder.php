<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Train;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Train::create([
            'name' => 'فجر',
            'company' => 'رجا',
            'wagon' => '۴ تخته',
            'is_active' => true,
        ]);

        Train::create([
            'name' => 'غزال',
            'company' => 'فدک',
            'wagon' => '۵ ستاره',
            'is_active' => true,
        ]);

        Train::create([
            'name' => 'صبا',
            'company' => 'رجا',
            'wagon' => '۶ تخته',
            'is_active' => true,
        ]);
    }
}