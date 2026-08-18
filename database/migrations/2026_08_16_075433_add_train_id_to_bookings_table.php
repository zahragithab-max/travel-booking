<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // اگر train_id از قبل وجود نداشت، اضافه‌اش کن
        if (!Schema::hasColumn('bookings', 'train_id')) {

            Schema::table('bookings', function (Blueprint $table) {

                $table->foreignId('train_id')
                    ->nullable()
                    ->after('flight_id');

            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('bookings', 'train_id')) {

            Schema::table('bookings', function (Blueprint $table) {

                $table->dropColumn('train_id');

            });
        }
    }
};