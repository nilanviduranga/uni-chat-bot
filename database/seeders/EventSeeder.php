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
                'date' => '2025-10-15',
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'location' => 'Colosium',
            ],
            [
                'name' => 'Sustainability Workshop',
                'description' => 'A workshop focused on sustainable practices in technology.',
                'date' => '2025-11-20',
                'start_time' => '10:00:00',
                'end_time' => '15:00:00',
                'location' => 'Main Auditorium, University',
            ],
            [
                'name' => 'AI & Machine Learning Bootcamp',
                'description' => 'Hands-on training in AI/ML for university students.',
                'date' => '2025-09-10',
                'start_time' => '08:30:00',
                'end_time' => '16:30:00',
                'location' => 'Computer Lab 3, Tech Building',
            ],
            [
                'name' => 'Startup Pitch Night',
                'description' => 'Students and alumni pitch their startup ideas to investors.',
                'date' => '2025-08-25',
                'start_time' => '18:00:00',
                'end_time' => '21:00:00',
                'location' => 'Innovation Hub, UOC',
            ],
            [
                'name' => 'Cybersecurity Awareness Day',
                'description' => 'Sessions on modern threats, best practices, and ethical hacking demos.',
                'date' => '2025-10-01',
                'start_time' => '09:00:00',
                'end_time' => '13:00:00',
                'location' => 'Main Hall, UOC',
            ],
            [
                'name' => 'Hackathon 24 Hours',
                'description' => 'A 24-hour coding challenge to solve real-world problems.',
                'date' => '2025-12-05',
                'start_time' => '10:00:00',
                'end_time' => '10:00:00',
                'location' => 'Tech Innovation Lab',
            ],
            [
                'name' => 'Mobile App Dev Meetup',
                'description' => 'Knowledge-sharing session on Android and iOS app development.',
                'date' => '2025-09-20',
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
                'location' => 'Lecture Hall B2',
            ],
            [
                'name' => 'Internship and Career Fair',
                'description' => 'Tech companies offering internships and job opportunities.',
                'date' => '2025-10-30',
                'start_time' => '09:00:00',
                'end_time' => '16:00:00',
                'location' => 'University Grounds',
            ],
            [
                'name' => 'Research Symposium 2025',
                'description' => 'Presentation of final year student research projects in computing.',
                'date' => '2025-11-05',
                'start_time' => '08:00:00',
                'end_time' => '13:00:00',
                'location' => 'Conference Room A',
            ],
            [
                'name' => 'Open Source Contribution Day',
                'description' => 'Students collaborate to contribute to open-source software.',
                'date' => '2025-08-18',
                'start_time' => '10:00:00',
                'end_time' => '17:00:00',
                'location' => 'Lab 5, Tech Block',
            ],
        ]);
    }
}
