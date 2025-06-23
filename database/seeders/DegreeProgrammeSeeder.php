<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DegreeProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('degree_programmes')->insert([
            [
                'name' => 'Bachelor of Information and Communication Technology Honours',
                'description' => 'A comprehensive program focusing on IT fundamentals, software development, and system management.',
                'department_id' => 1,
            ],
            [
                'name' => 'Bachelor of Engineering Technology Honours in Instrumentation and Automation',
                'description' => 'Specializes in the design and implementation of automated systems and instrumentation technologies.',
                'department_id' => 2,
            ],
            [
                'name' => 'Bachelor of Biosystems Technology Honours in Agriculture',
                'description' => 'Focuses on applying technology to enhance agricultural practices and sustainability.',
                'department_id' => 3,
            ],
            [
                'name' => 'Bachelor of Biosystems Technology Honours in Environmental Technology',
                'description' => 'Covers technologies that address environmental issues and promote ecological balance.',
                'department_id' => 4,
            ],
        ]);
    }
}
