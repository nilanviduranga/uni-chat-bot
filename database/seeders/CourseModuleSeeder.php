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
            ['course_code' => 'IC101', 'name' => 'Introduction to Programming', 'credits' => 3, 'status' => 'active', 'semester_id' => 1, 'degree_programme_id' => 1],
            ['course_code' => 'IC102', 'name' => 'Database Systems', 'credits' => 3, 'status' => 'active', 'semester_id' => 1, 'degree_programme_id' => 1],
            ['course_code' => 'IC103', 'name' => 'Data Structures and Algorithms', 'credits' => 3, 'status' => 'active', 'semester_id' => 2, 'degree_programme_id' => 1],
            ['course_code' => 'IC104', 'name' => 'Computer Networks', 'credits' => 3, 'status' => 'active', 'semester_id' => 2, 'degree_programme_id' => 1],
            ['course_code' => 'IC201', 'name' => 'Web Technologies', 'credits' => 3, 'status' => 'active', 'semester_id' => 3, 'degree_programme_id' => 1],
            ['course_code' => 'IC202', 'name' => 'Operating Systems', 'credits' => 3, 'status' => 'active', 'semester_id' => 3, 'degree_programme_id' => 1],
            ['course_code' => 'IC301', 'name' => 'Software Engineering', 'credits' => 3, 'status' => 'active', 'semester_id' => 5, 'degree_programme_id' => 1],
            ['course_code' => 'IC302', 'name' => 'Mobile Application Development', 'credits' => 3, 'status' => 'active', 'semester_id' => 5, 'degree_programme_id' => 1],
            ['course_code' => 'IC303', 'name' => 'Artificial Intelligence', 'credits' => 3, 'status' => 'active', 'semester_id' => 6, 'degree_programme_id' => 1],
            ['course_code' => 'IC304', 'name' => 'Cyber Security Fundamentals', 'credits' => 3, 'status' => 'active', 'semester_id' => 6, 'degree_programme_id' => 1],

            ['course_code' => 'IT201', 'name' => 'Automation Fundamentals', 'credits' => 3, 'status' => 'active', 'semester_id' => 3, 'degree_programme_id' => 2],
            ['course_code' => 'IT202', 'name' => 'Instrumentation Systems Design', 'credits' => 3, 'status' => 'active', 'semester_id' => 4, 'degree_programme_id' => 2],
            ['course_code' => 'IT203', 'name' => 'Process Control and Automation', 'credits' => 3, 'status' => 'active', 'semester_id' => 4, 'degree_programme_id' => 2],
            ['course_code' => 'IT301', 'name' => 'Embedded Systems', 'credits' => 3, 'status' => 'active', 'semester_id' => 5, 'degree_programme_id' => 2],
            ['course_code' => 'IT302', 'name' => 'Advanced Instrumentation', 'credits' => 3, 'status' => 'active', 'semester_id' => 6, 'degree_programme_id' => 2],
            ['course_code' => 'IT303', 'name' => 'Robotics and Automation', 'credits' => 3, 'status' => 'active', 'semester_id' => 6, 'degree_programme_id' => 2],
            ['course_code' => 'IT304', 'name' => 'Sensors and Measurement', 'credits' => 3, 'status' => 'active', 'semester_id' => 7, 'degree_programme_id' => 2],
            ['course_code' => 'IT305', 'name' => 'Control System Engineering', 'credits' => 3, 'status' => 'active', 'semester_id' => 7, 'degree_programme_id' => 2],

            ['course_code' => 'AG301', 'name' => 'Precision Agriculture', 'credits' => 2, 'status' => 'active', 'semester_id' => 5, 'degree_programme_id' => 3],
            ['course_code' => 'AG302', 'name' => 'Soil and Water Conservation', 'credits' => 2, 'status' => 'active', 'semester_id' => 6, 'degree_programme_id' => 3],
            ['course_code' => 'AG303', 'name' => 'Crop Production Technology', 'credits' => 3, 'status' => 'active', 'semester_id' => 6, 'degree_programme_id' => 3],
            ['course_code' => 'AG304', 'name' => 'Farm Management', 'credits' => 3, 'status' => 'active', 'semester_id' => 7, 'degree_programme_id' => 3],
            ['course_code' => 'AG305', 'name' => 'Agricultural Biotechnology', 'credits' => 3, 'status' => 'active', 'semester_id' => 7, 'degree_programme_id' => 3],
            ['course_code' => 'AG306', 'name' => 'Agricultural Economics', 'credits' => 2, 'status' => 'active', 'semester_id' => 8, 'degree_programme_id' => 3],

            ['course_code' => 'EN401', 'name' => 'Environmental Impact Assessment', 'credits' => 2, 'status' => 'active', 'semester_id' => 8, 'degree_programme_id' => 4],
            ['course_code' => 'EN402', 'name' => 'Waste Management Technologies', 'credits' => 2, 'status' => 'active', 'semester_id' => 7, 'degree_programme_id' => 4],
            ['course_code' => 'EN403', 'name' => 'Renewable Energy Technologies', 'credits' => 3, 'status' => 'active', 'semester_id' => 8, 'degree_programme_id' => 4],
            ['course_code' => 'EN404', 'name' => 'Environmental Monitoring', 'credits' => 3, 'status' => 'active', 'semester_id' => 6, 'degree_programme_id' => 4],
            ['course_code' => 'EN405', 'name' => 'Climate Change and Adaptation', 'credits' => 3, 'status' => 'active', 'semester_id' => 7, 'degree_programme_id' => 4],
            ['course_code' => 'EN406', 'name' => 'Sustainable Development', 'credits' => 3, 'status' => 'active', 'semester_id' => 8, 'degree_programme_id' => 4],
        ]);
    }
}
