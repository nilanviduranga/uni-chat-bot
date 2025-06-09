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
        Schema::create('bus_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('route_name');
            $table->string('route_number')->unique(); // Unique route number for identification
            $table->string('start_point');
            $table->string('end_point');
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->string('status')->default('On Time'); // Optional: On Time, Delayed, Cancelled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_schedules');
    }
};
