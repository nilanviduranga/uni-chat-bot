<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentBatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batches = [
            ['batch_code' => '18/19', 'semester_id' => 1],
            ['batch_code' => '19/20', 'semester_id' => 3],
            ['batch_code' => '20/21', 'semester_id' => 5],
            ['batch_code' => '21/22', 'semester_id' => 7],
            ['batch_code' => '22/23', 'semester_id' => 8],
        ];

        DB::table('student_batches')->insert($batches);
    }
}
