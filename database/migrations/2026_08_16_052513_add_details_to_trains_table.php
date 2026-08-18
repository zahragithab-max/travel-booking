<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('trains', function (Blueprint $table) {

            $table->string('origin')->nullable();
            $table->string('destination')->nullable();

            $table->string('departure_time')->nullable();
            $table->string('arrival_time')->nullable();

            $table->string('duration')->nullable();

            $table->unsignedInteger('price')->nullable();

            $table->unsignedInteger('capacity')->nullable();

            $table->unsignedInteger('available_seats')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('trains', function (Blueprint $table) {

            $table->dropColumn([
                'origin',
                'destination',
                'departure_time',
                'arrival_time',
                'duration',
                'price',
                'capacity',
                'available_seats',
            ]);

        });
    }
};