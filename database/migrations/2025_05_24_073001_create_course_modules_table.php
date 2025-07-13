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
        Schema::create('course_modules', function (Blueprint $table) {
            $table->string('course_code')->primary(); // e.g., IC101
            $table->string('name')->unique();
            $table->string('lecturer')->nullable();
            $table->integer('credits')->default(0);
            $table->string('status')->default('active');
            $table->unsignedBigInteger('semester_id')->nullable();
            $table->unsignedBigInteger('degree_programme_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_modules');
    }
};
