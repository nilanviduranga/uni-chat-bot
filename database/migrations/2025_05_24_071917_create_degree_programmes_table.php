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
        Schema::create('degree_programmes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('duration')->nullable(); // Duration in years
            $table->integer('department_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('degree_programmes');
    }
};
