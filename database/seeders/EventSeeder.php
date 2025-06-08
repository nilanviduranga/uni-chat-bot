<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
           [
                'name' => 'Annual Tech Conference',
                'description' => 'A conference to discuss the latest trends in technology.',
                'date' => '2023-10-15',
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'location' => 'Colosium',
            ],
            [
                'name' => 'Sustainability Workshop',
                'description' => 'A workshop focused on sustainable practices in technology.',
                'date' => '2023-11-20',
                'start_time' => '10:00:00',
                'end_time' => '15:00:00',
                'location' => 'Main Auditorium, University',
            ],
        ]);
    }
}
