<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseModuleScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_module_schedules')->insert([
            [
                'module_id' => 1, // e.g., IC101
                'lecturer' => 'Dr. S. Perera',
                'class_date' => '2025-06-12',
                'start_time' => '08:00:00',
                'end_time' => '10:00:00',
            ],
            [
                'module_id' => 1,
                'lecturer' => 'Dr. S. Perera',
                'class_date' => '2025-06-14',
                'start_time' => '08:00:00',
                'end_time' => '10:00:00',
            ],
            [
                'module_id' => 2, // e.g., IC102
                'lecturer' => 'Ms. A. Silva',
                'class_date' => '2025-06-13',
                'start_time' => '10:00:00',
                'end_time' => '12:00:00',
            ],
        ]);
    }
}
