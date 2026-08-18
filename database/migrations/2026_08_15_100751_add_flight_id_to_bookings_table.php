<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            $table->foreignId('flight_id')
                ->nullable()
                ->after('user_id')
                ->constrained('flights')
                ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            $table->dropForeign(['flight_id']);

            $table->dropColumn('flight_id');

        });
    }
};