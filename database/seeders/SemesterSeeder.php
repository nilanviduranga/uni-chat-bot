<?php

namespace Database\Seeders;

use App\Models\semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semesters = [
            '1s1',
            '1s2',
            '2s1',
            '2s2',
            '3s1',
            '3s2',
            '4s1',
            '4s2',
        ];

        foreach ($semesters as $name) {
            semester::create(['name' => $name]);
        }
    }
}
