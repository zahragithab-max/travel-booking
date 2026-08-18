<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trains', function (Blueprint $table) {

            $table->id();

            // اطلاعات اصلی
            $table->string('name');
            $table->string('company');

            // مسیر
            $table->string('origin');
            $table->string('destination');

            // نوع واگن
            $table->string('wagon');

            // زمان حرکت و رسیدن
            $table->string('departure_time');
            $table->string('arrival_time');

            // مدت سفر
            $table->string('duration');

            // قیمت
            $table->decimal('price', 12, 0);

            // ظرفیت
            $table->unsignedInteger('capacity');

            // صندلی‌های باقی‌مانده
            $table->unsignedInteger('available_seats');

            // وضعیت
            $table->boolean('is_active')->default(true);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};

