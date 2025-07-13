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
            ['course_code' => 'IC101', 'name' => 'Introduction to Programming', 'lecturer' => 'Dr. S. Perera', 'credits' => 3, 'status' => 'active', 'semester_id' => 1, 'degree_programme_id' => 1],
            ['course_code' => 'IC102', 'name' => 'Database Systems', 'lecturer' => 'Prof. A. Fernando', 'credits' => 3, 'status' => 'active', 'semester_id' => 1, 'degree_programme_id' => 1],
            ['course_code' => 'IC103', 'name' => 'Data Structures and Algorithms', 'lecturer' => 'Dr. B. Jayasena', 'credits' => 3, 'status' => 'active', 'semester_id' => 2, 'degree_programme_id' => 1],
            ['course_code' => 'IC104', 'name' => 'Computer Networks', 'lecturer' => 'Prof. K. Wijeratne', 'credits' => 3, 'status' => 'active', 'semester_id' => 2, 'degree_programme_id' => 1],
            ['course_code' => 'IC201', 'name' => 'Web Technologies', 'lecturer' => 'Ms. N. Ekanayake', 'credits' => 3, 'status' => 'active', 'semester_id' => 3, 'degree_programme_id' => 1],
            ['course_code' => 'IC202', 'name' => 'Operating Systems', 'lecturer' => 'Dr. L. Abeywickrama', 'credits' => 3, 'status' => 'active', 'semester_id' => 3, 'degree_programme_id' => 1],
            ['course_code' => 'IC301', 'name' => 'Software Engineering', 'lecturer' => 'Prof. R. Silva', 'credits' => 3, 'status' => 'active', 'semester_id' => 5, 'degree_programme_id' => 1],
            ['course_code' => 'IC302', 'name' => 'Mobile Application Development', 'lecturer' => 'Mr. C. Bandara', 'credits' => 3, 'status' => 'active', 'semester_id' => 5, 'degree_programme_id' => 1],
            ['course_code' => 'IC303', 'name' => 'Artificial Intelligence', 'lecturer' => 'Dr. T. Gunawardena', 'credits' => 3, 'status' => 'active', 'semester_id' => 6, 'degree_programme_id' => 1],
            ['course_code' => 'IC304', 'name' => 'Cyber Security Fundamentals', 'lecturer' => 'Ms. H. Dissanayake', 'credits' => 3, 'status' => 'active', 'semester_id' => 6, 'degree_programme_id' => 1],

            ['course_code' => 'IT201', 'name' => 'Automation Fundamentals', 'lecturer' => 'Dr. R. Perera', 'credits' => 3, 'status' => 'active', 'semester_id' => 3, 'degree_programme_id' => 2],
            ['course_code' => 'IT202', 'name' => 'Instrumentation Systems Design', 'lecturer' => 'Prof. J. Samarasekara', 'credits' => 3, 'status' => 'active', 'semester_id' => 4, 'degree_programme_id' => 2],
            ['course_code' => 'IT203', 'name' => 'Process Control and Automation', 'lecturer' => 'Dr. A. Madushanka', 'credits' => 3, 'status' => 'active', 'semester_id' => 4, 'degree_programme_id' => 2],
            ['course_code' => 'IT301', 'name' => 'Embedded Systems', 'lecturer' => 'Ms. V. Herath', 'credits' => 3, 'status' => 'active', 'semester_id' => 5, 'degree_programme_id' => 2],
            ['course_code' => 'IT302', 'name' => 'Advanced Instrumentation', 'lecturer' => 'Prof. D. Ranasinghe', 'credits' => 3, 'status' => 'active', 'semester_id' => 6, 'degree_programme_id' => 2],
            ['course_code' => 'IT303', 'name' => 'Robotics and Automation', 'lecturer' => 'Dr. U. Jayawardena', 'credits' => 3, 'status' => 'active', 'semester_id' => 6, 'degree_programme_id' => 2],
            ['course_code' => 'IT304', 'name' => 'Sensors and Measurement', 'lecturer' => 'Mr. S. Weerasinghe', 'credits' => 3, 'status' => 'active', 'semester_id' => 7, 'degree_programme_id' => 2],
            ['course_code' => 'IT305', 'name' => 'Control System Engineering', 'lecturer' => 'Dr. G. Fonseka', 'credits' => 3, 'status' => 'active', 'semester_id' => 7, 'degree_programme_id' => 2],

            ['course_code' => 'AG301', 'name' => 'Precision Agriculture', 'lecturer' => 'Dr. M. Abeykoon', 'credits' => 2, 'status' => 'active', 'semester_id' => 5, 'degree_programme_id' => 3],
            ['course_code' => 'AG302', 'name' => 'Soil and Water Conservation', 'lecturer' => 'Prof. R. Rathnayake', 'credits' => 2, 'status' => 'active', 'semester_id' => 6, 'degree_programme_id' => 3],
            ['course_code' => 'AG303', 'name' => 'Crop Production Technology', 'lecturer' => 'Dr. K. Peiris', 'credits' => 3, 'status' => 'active', 'semester_id' => 6, 'degree_programme_id' => 3],
            ['course_code' => 'AG304', 'name' => 'Farm Management', 'lecturer' => 'Ms. I. Kumari', 'credits' => 3, 'status' => 'active', 'semester_id' => 7, 'degree_programme_id' => 3],
            ['course_code' => 'AG305', 'name' => 'Agricultural Biotechnology', 'lecturer' => 'Dr. D. Karunaratne', 'credits' => 3, 'status' => 'active', 'semester_id' => 7, 'degree_programme_id' => 3],
            ['course_code' => 'AG306', 'name' => 'Agricultural Economics', 'lecturer' => 'Prof. C. Abeynayake', 'credits' => 2, 'status' => 'active', 'semester_id' => 8, 'degree_programme_id' => 3],

            ['course_code' => 'EN401', 'name' => 'Environmental Impact Assessment', 'lecturer' => 'Dr. T. Senanayake', 'credits' => 2, 'status' => 'active', 'semester_id' => 8, 'degree_programme_id' => 4],
            ['course_code' => 'EN402', 'name' => 'Waste Management Technologies', 'lecturer' => 'Ms. B. Wickramasinghe', 'credits' => 2, 'status' => 'active', 'semester_id' => 7, 'degree_programme_id' => 4],
            ['course_code' => 'EN403', 'name' => 'Renewable Energy Technologies', 'lecturer' => 'Prof. W. Gamage', 'credits' => 3, 'status' => 'active', 'semester_id' => 8, 'degree_programme_id' => 4],
            ['course_code' => 'EN404', 'name' => 'Environmental Monitoring', 'lecturer' => 'Dr. H. Bandara', 'credits' => 3, 'status' => 'active', 'semester_id' => 6, 'degree_programme_id' => 4],
            ['course_code' => 'EN405', 'name' => 'Climate Change and Adaptation', 'lecturer' => 'Dr. N. Dahanayake', 'credits' => 3, 'status' => 'active', 'semester_id' => 7, 'degree_programme_id' => 4],
            ['course_code' => 'EN406', 'name' => 'Sustainable Development', 'lecturer' => 'Ms. R. Gunasekara', 'credits' => 3, 'status' => 'active', 'semester_id' => 8, 'degree_programme_id' => 4],
        ]);
    }
}
