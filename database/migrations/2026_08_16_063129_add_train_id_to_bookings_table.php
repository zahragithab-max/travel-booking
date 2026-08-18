<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            $table->foreignId('train_id')
                ->nullable()
                ->after('flight_id')
                ->constrained('trains')
                ->nullOnDelete();

            $table->string('airline')
                ->nullable()
                ->change();

        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            $table->dropForeign(['train_id']);
            $table->dropColumn('train_id');

            $table->string('airline')
                ->nullable(false)
                ->change();

        });
    }
};