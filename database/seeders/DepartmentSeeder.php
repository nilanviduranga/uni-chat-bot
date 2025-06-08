<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'name' => 'Information and Communication Technology
',
                'description' => 'Responsible for managing and maintaining the organization\'s IT infrastructure.',
            ],
            [
                'name' => 'Instrumentation and Automation Technology
',
                'description' => 'Handles the design, development, and maintenance of automated systems and instrumentation.',
            ],
            [
                'name' => 'Agricultural Technology',
                'description' => 'Focuses on the application of technology in agriculture to improve productivity and sustainability.',
            ],
            [
                'name' => 'Environmental Technology',
                'description' => 'Specializes in technologies that address environmental challenges and promote sustainability.',
            ]

        ]);
    }
}
