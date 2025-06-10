<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('exam_results')->insert([
            [
                'user_id' => 1, // Nilan Viduranga
                'module_id' => 'IC101', // Assuming IC101 has id = 1
                'facing_year' => '2024',
                'grade' => 'A',
            ],
            [
                'user_id' => 1,
                'module_id' => 'IC102', // IC102
                'facing_year' => '2024',
                'grade' => 'A-',
            ],
            [
                'user_id' => 2, // Miyuru Sanjana
                'module_id' => 'IC101',
                'facing_year' => '2024',
                'grade' => 'B+',
            ],
            [
                'user_id' => 2,
                'module_id' => 'IC102',
                'facing_year' => '2024',
                'grade' => 'B',
            ],
        ]);
    }
}
