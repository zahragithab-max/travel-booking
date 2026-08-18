<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('flights', function (Blueprint $table) {
    
            $table->string('flight_number')
                ->nullable()
                ->after('airline');
    
            $table->date('flight_date')
                ->nullable()
                ->after('destination');
    
            $table->time('arrival_time')
                ->nullable()
                ->after('departure_time');
    
            $table->decimal('price', 12, 2)
                ->nullable()
                ->after('arrival_time');
    
            $table->integer('capacity')
                ->nullable()
                ->after('price');
    
            $table->integer('available_seats')
                ->nullable()
                ->after('capacity');
    
            $table->string('flight_class')
                ->nullable()
                ->default('economy')
                ->after('available_seats');
    
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('flights', function (Blueprint $table) {
            //
        });
    }
};
