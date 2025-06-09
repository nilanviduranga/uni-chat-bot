<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_modules')->insert([
            [
                'course_code' => 'IC101',
                'name' => 'Introduction to Programming',
                'credits' => 3,
                'status' => 'active',
                'semester_id' => 1, // e.g., 1s1
                'degree_programme_id' => 1, // ICT
            ],
            [
                'course_code' => 'IC102',
                'name' => 'Database Systems',
                'credits' => 3,
                'status' => 'active',
                'semester_id' => 1,
                'degree_programme_id' => 1,
            ],
            [
                'course_code' => 'ET201',
                'name' => 'Automation Fundamentals',
                'credits' => 3,
                'status' => 'active',
                'semester_id' => 3,
                'degree_programme_id' => 2, // Eng. Tech
            ],
            [
                'course_code' => 'BS301',
                'name' => 'Precision Agriculture',
                'credits' => 2,
                'status' => 'active',
                'semester_id' => 5,
                'degree_programme_id' => 3, // Agriculture
            ],
            [
                'course_code' => 'EN402',
                'name' => 'Environmental Impact Assessment',
                'credits' => 2,
                'status' => 'active',
                'semester_id' => 8,
                'degree_programme_id' => 4, // Env. Tech
            ],
        ]);
    }
}
