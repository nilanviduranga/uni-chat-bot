<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            [
                'full_name' => 'Nilan Viduranga',
                'name_with_initials' => 'N. Viduranga',
                'email' => 'nilanviduranga44@gmail.com',
                'mobile' => '1234567890',
                'dob' => '1990-01-01',
                'address' => '123 Main Street',
                'city' => 'Colombo',
                'country' => 'Sri Lanka',
                'batch_id' => 1,
                'degree_programme_id' => 1,
            ],
            [
                'full_name' => 'Miyuru Sanjana',
                'name_with_initials' => 'M. Sanjana',
                'email' => 'elbows.marine.0k@icloud.com',
                'mobile' => '1234567890',
                'dob' => '1990-01-01',
                'address' => '123 Main Street',
                'city' => 'Colombo',
                'country' => 'Sri Lanka',
                'batch_id' => 1,
                'degree_programme_id' => 1,
            ],
            [
                'full_name' => 'Test User',
                'name_with_initials' => 'Test User',
                'email' => 'testuser@nexora.com',
                'mobile' => '1234567890',
                'dob' => '1990-01-01',
                'address' => '123 Main Street',
                'city' => 'Colombo',
                'country' => 'Sri Lanka',
                'batch_id' => 1,
                'degree_programme_id' => 1,
            ],


        ]);
    }
}
