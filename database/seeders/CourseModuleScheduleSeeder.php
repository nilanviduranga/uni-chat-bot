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
            // 2025-07-13 (Sun) — Added manually
            ['course_code' => 'AG306', 'class_date' => '2025-07-13', 'start_time' => '09:00:00', 'end_time' => '11:30:00', 'created_at' => now(), 'updated_at' => now()],
            ['course_code' => 'EN401', 'class_date' => '2025-07-13', 'start_time' => '13:00:00', 'end_time' => '15:00:00', 'created_at' => now(), 'updated_at' => now()],

            // 2025-07-14 (Mon)
            ['course_code' => 'IC301', 'class_date' => '2025-07-14', 'start_time' => '08:00:00', 'end_time' => '11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['course_code' => 'IC102', 'class_date' => '2025-07-14', 'start_time' => '11:15:00', 'end_time' => '12:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['course_code' => 'IT203', 'class_date' => '2025-07-14', 'start_time' => '13:00:00', 'end_time' => '15:00:00', 'created_at' => now(), 'updated_at' => now()],

            // 2025-07-15 (Tue)
            ['course_code' => 'IC101', 'class_date' => '2025-07-15', 'start_time' => '08:00:00', 'end_time' => '10:30:00', 'created_at' => now(), 'updated_at' => now()],
            ['course_code' => 'IC104', 'class_date' => '2025-07-15', 'start_time' => '10:45:00', 'end_time' => '12:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['course_code' => 'IT202', 'class_date' => '2025-07-15', 'start_time' => '13:00:00', 'end_time' => '16:00:00', 'created_at' => now(), 'updated_at' => now()],

            // 2025-07-16 (Wed)
            ['course_code' => 'IC302', 'class_date' => '2025-07-16', 'start_time' => '08:30:00', 'end_time' => '11:30:00', 'created_at' => now(), 'updated_at' => now()],
            ['course_code' => 'IT305', 'class_date' => '2025-07-16', 'start_time' => '13:30:00', 'end_time' => '16:00:00', 'created_at' => now(), 'updated_at' => now()],

            // 2025-07-17 (Thu)
            ['course_code' => 'IC303', 'class_date' => '2025-07-17', 'start_time' => '08:00:00', 'end_time' => '10:30:00', 'created_at' => now(), 'updated_at' => now()],
            ['course_code' => 'IT301', 'class_date' => '2025-07-17', 'start_time' => '10:45:00', 'end_time' => '12:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['course_code' => 'IT204', 'class_date' => '2025-07-17', 'start_time' => '13:00:00', 'end_time' => '16:00:00', 'created_at' => now(), 'updated_at' => now()], // example, adjust if needed

            // 2025-07-18 (Fri)
            ['course_code' => 'IC103', 'class_date' => '2025-07-18', 'start_time' => '08:00:00', 'end_time' => '10:30:00', 'created_at' => now(), 'updated_at' => now()],
            ['course_code' => 'IT302', 'class_date' => '2025-07-18', 'start_time' => '10:45:00', 'end_time' => '12:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['course_code' => 'IC105', 'class_date' => '2025-07-18', 'start_time' => '13:00:00', 'end_time' => '17:00:00', 'created_at' => now(), 'updated_at' => now()], // example, adjust if needed

            // 2025-07-19 (Sat)
            ['course_code' => 'IC101', 'class_date' => '2025-07-19', 'start_time' => '08:15:00', 'end_time' => '10:15:00', 'created_at' => now(), 'updated_at' => now()],
            ['course_code' => 'IC106', 'class_date' => '2025-07-19', 'start_time' => '13:30:00', 'end_time' => '16:00:00', 'created_at' => now(), 'updated_at' => now()], // example, adjust if needed
        ]);
    }
}
