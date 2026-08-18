<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('first_name');
            $table->string('last_name');

            $table->string('from');
            $table->string('to');

            $table->date('departure');
            $table->date('return_date')->nullable();

            $table->unsignedInteger('passengers');

            $table->string('airline');

            $table->string('time');
            $table->string('arrival');

            $table->string('ticket_type')->nullable();
            $table->string('seat')->nullable();

            $table->string('price');

            $table->string('tracking_code')->unique();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};