<?php

namespace Database\Seeders;

use App\Models\BusSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = [
            [
                'route_name' => 'Pitipana to UOC FOT',
                'route_number' => 'FOT-001',
                'start_point' => 'Pitipana',
                'end_point' => 'UOC FOT',
                'departure_time' => '07:00:00',
                'arrival_time' => '07:20:00',
                'status' => 'On Time',
            ],
            [
                'route_name' => 'Kottawa to UOC FOT',
                'route_number' => 'FOT-002',
                'start_point' => 'Kottawa',
                'end_point' => 'UOC FOT',
                'departure_time' => '07:15:00',
                'arrival_time' => '07:45:00',
                'status' => 'On Time',
            ],
            [
                'route_name' => 'Homagama to UOC FOT',
                'route_number' => 'FOT-003',
                'start_point' => 'Homagama',
                'end_point' => 'UOC FOT',
                'departure_time' => '06:50:00',
                'arrival_time' => '07:10:00',
                'status' => 'Delayed',
            ],
            [
                'route_name' => 'UOC FOT to Pitipana',
                'route_number' => 'FOT-004',
                'start_point' => 'UOC FOT',
                'end_point' => 'Pitipana',
                'departure_time' => '16:30:00',
                'arrival_time' => '16:50:00',
                'status' => 'On Time',
            ],
        ];

        foreach ($schedules as $schedule) {
            BusSchedule::create($schedule);
        }
    }
}
