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
            // 2025-06-24 (Tue) — 3 lectures
            ['module_id' => 1, 'lecturer' => 'Dr. S. Perera', 'class_date' => '2025-06-24', 'start_time' => '08:00:00', 'end_time' => '10:30:00'],  // IC101
            ['module_id' => 4, 'lecturer' => 'Dr. L. Silva', 'class_date' => '2025-06-24', 'start_time' => '10:45:00', 'end_time' => '12:00:00'],  // IC104
            ['module_id' => 21, 'lecturer' => 'Prof. M. Rajapaksha', 'class_date' => '2025-06-24', 'start_time' => '13:00:00', 'end_time' => '16:00:00'],  // AG301

            // 2025-06-25 (Wed) — 2 lectures
            ['module_id' => 2, 'lecturer' => 'Ms. A. Silva', 'class_date' => '2025-06-25', 'start_time' => '08:30:00', 'end_time' => '11:00:00'],  // IC102
            ['module_id' => 27, 'lecturer' => 'Dr. L. Wijesinghe', 'class_date' => '2025-06-25', 'start_time' => '13:15:00', 'end_time' => '16:00:00'],  // EN401

            // 2025-06-26 (Thu) — 3 lectures
            ['module_id' => 3, 'lecturer' => 'Prof. K. Fernando', 'class_date' => '2025-06-26', 'start_time' => '08:00:00', 'end_time' => '10:30:00'],  // IC103
            ['module_id' => 11, 'lecturer' => 'Dr. N. Jayawardena', 'class_date' => '2025-06-26', 'start_time' => '10:45:00', 'end_time' => '12:00:00'],  // IT201
            ['module_id' => 5, 'lecturer' => 'Ms. P. Rajapaksha', 'class_date' => '2025-06-26', 'start_time' => '13:00:00', 'end_time' => '17:00:00'],  // IC201

            // 2025-06-27 (Fri) — 2 lectures
            ['module_id' => 1, 'lecturer' => 'Dr. S. Perera', 'class_date' => '2025-06-27', 'start_time' => '08:15:00', 'end_time' => '10:15:00'],  // IC101
            ['module_id' => 6, 'lecturer' => 'Dr. A. Kumar', 'class_date' => '2025-06-27', 'start_time' => '13:30:00', 'end_time' => '16:00:00'],  // IC202

            // 2025-06-30 (Mon) — 3 lectures
            ['module_id' => 7, 'lecturer' => 'Dr. W. Jayasundara', 'class_date' => '2025-06-30', 'start_time' => '08:00:00', 'end_time' => '11:00:00'],  // IC301
            ['module_id' => 2, 'lecturer' => 'Ms. A. Silva', 'class_date' => '2025-06-30', 'start_time' => '11:15:00', 'end_time' => '12:00:00'],  // IC102 (short lecture)
            ['module_id' => 22, 'lecturer' => 'Prof. S. Fernando', 'class_date' => '2025-06-30', 'start_time' => '13:00:00', 'end_time' => '15:00:00'],  // AG302

            // 2025-07-01 (Tue) — 2 lectures
            ['module_id' => 8, 'lecturer' => 'Ms. D. Wijeratne', 'class_date' => '2025-07-01', 'start_time' => '08:30:00', 'end_time' => '11:30:00'],  // IC302
            ['module_id' => 28, 'lecturer' => 'Dr. R. Silva', 'class_date' => '2025-07-01', 'start_time' => '13:30:00', 'end_time' => '16:00:00'],  // EN402

            // 2025-07-02 (Wed) — 3 lectures
            ['module_id' => 9, 'lecturer' => 'Prof. S. Gunasekara', 'class_date' => '2025-07-02', 'start_time' => '08:00:00', 'end_time' => '10:30:00'],  // IC303
            ['module_id' => 12, 'lecturer' => 'Dr. N. Jayawardena', 'class_date' => '2025-07-02', 'start_time' => '10:45:00', 'end_time' => '12:00:00'],  // IT202
            ['module_id' => 23, 'lecturer' => 'Prof. M. Rajapaksha', 'class_date' => '2025-07-02', 'start_time' => '13:00:00', 'end_time' => '16:00:00'],  // AG303

            // 2025-07-03 (Thu) — 2 lectures
            ['module_id' => 10, 'lecturer' => 'Dr. K. Perera', 'class_date' => '2025-07-03', 'start_time' => '08:00:00', 'end_time' => '10:30:00'],  // IC304
            ['module_id' => 29, 'lecturer' => 'Dr. L. Wijesinghe', 'class_date' => '2025-07-03', 'start_time' => '13:00:00', 'end_time' => '16:00:00'],  // EN403
        ]);
    }
}
