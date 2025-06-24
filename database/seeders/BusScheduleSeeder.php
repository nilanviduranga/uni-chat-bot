<?php

namespace Database\Seeders;

use App\Models\BusSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $schedules = [
            // === MORNING ARRIVALS ===
            [
                'route_name' => 'Pitipana to UOC FOT',
                'route_number' => 'FOT-001',
                'start_point' => 'Pitipana',
                'end_point' => 'UOC FOT',
                'departure_time' => '06:40:00',
                'arrival_time' => '07:00:00',
                'status' => 'On Time',
            ],
            [
                'route_name' => 'Homagama to UOC FOT',
                'route_number' => 'FOT-002',
                'start_point' => 'Homagama',
                'end_point' => 'UOC FOT',
                'departure_time' => '06:30:00',
                'arrival_time' => '06:50:00',
                'status' => 'On Time',
            ],
            [
                'route_name' => 'Kottawa to UOC FOT',
                'route_number' => 'FOT-003',
                'start_point' => 'Kottawa',
                'end_point' => 'UOC FOT',
                'departure_time' => '06:45:00',
                'arrival_time' => '07:15:00',
                'status' => 'Delayed',
            ],
            [
                'route_name' => 'Maharagama to UOC FOT',
                'route_number' => 'FOT-004',
                'start_point' => 'Maharagama',
                'end_point' => 'UOC FOT',
                'departure_time' => '06:20:00',
                'arrival_time' => '07:00:00',
                'status' => 'On Time',
            ],
            [
                'route_name' => 'Godagama to UOC FOT',
                'route_number' => 'FOT-005',
                'start_point' => 'Godagama',
                'end_point' => 'UOC FOT',
                'departure_time' => '06:50:00',
                'arrival_time' => '07:15:00',
                'status' => 'On Time',
            ],
            [
                'route_name' => 'Malabe to UOC FOT',
                'route_number' => 'FOT-006',
                'start_point' => 'Malabe',
                'end_point' => 'UOC FOT',
                'departure_time' => '06:10:00',
                'arrival_time' => '06:55:00',
                'status' => 'On Time',
            ],

            // === MIDDAY CONNECTIONS ===
            [
                'route_name' => 'Homagama to UOC FOT (Midday)',
                'route_number' => 'FOT-007',
                'start_point' => 'Homagama',
                'end_point' => 'UOC FOT',
                'departure_time' => '11:30:00',
                'arrival_time' => '11:50:00',
                'status' => 'On Time',
            ],
            [
                'route_name' => 'UOC FOT to Pitipana (Midday)',
                'route_number' => 'FOT-008',
                'start_point' => 'UOC FOT',
                'end_point' => 'Pitipana',
                'departure_time' => '12:30:00',
                'arrival_time' => '12:50:00',
                'status' => 'On Time',
            ],
            [
                'route_name' => 'Padukka to UOC FOT',
                'route_number' => 'FOT-009',
                'start_point' => 'Padukka',
                'end_point' => 'UOC FOT',
                'departure_time' => '10:30:00',
                'arrival_time' => '11:30:00',
                'status' => 'On Time',
            ],
            [
                'route_name' => 'UOC FOT to Maharagama',
                'route_number' => 'FOT-010',
                'start_point' => 'UOC FOT',
                'end_point' => 'Maharagama',
                'departure_time' => '13:15:00',
                'arrival_time' => '14:00:00',
                'status' => 'Delayed',
            ],

            // === EVENING DEPARTURES ===
            [
                'route_name' => 'UOC FOT to Pitipana',
                'route_number' => 'FOT-011',
                'start_point' => 'UOC FOT',
                'end_point' => 'Pitipana',
                'departure_time' => '16:00:00',
                'arrival_time' => '16:20:00',
                'status' => 'On Time',
            ],
            [
                'route_name' => 'UOC FOT to Kottawa',
                'route_number' => 'FOT-012',
                'start_point' => 'UOC FOT',
                'end_point' => 'Kottawa',
                'departure_time' => '16:30:00',
                'arrival_time' => '17:00:00',
                'status' => 'On Time',
            ],
            [
                'route_name' => 'UOC FOT to Malabe',
                'route_number' => 'FOT-013',
                'start_point' => 'UOC FOT',
                'end_point' => 'Malabe',
                'departure_time' => '17:00:00',
                'arrival_time' => '17:40:00',
                'status' => 'Cancelled',
            ],
            [
                'route_name' => 'UOC FOT to Homagama',
                'route_number' => 'FOT-014',
                'start_point' => 'UOC FOT',
                'end_point' => 'Homagama',
                'departure_time' => '16:20:00',
                'arrival_time' => '16:40:00',
                'status' => 'On Time',
            ],
            [
                'route_name' => 'UOC FOT to Avissawella',
                'route_number' => 'FOT-015',
                'start_point' => 'UOC FOT',
                'end_point' => 'Avissawella',
                'departure_time' => '17:10:00',
                'arrival_time' => '18:10:00',
                'status' => 'Delayed',
            ],
            [
                'route_name' => 'UOC FOT to Godagama',
                'route_number' => 'FOT-016',
                'start_point' => 'UOC FOT',
                'end_point' => 'Godagama',
                'departure_time' => '16:50:00',
                'arrival_time' => '17:15:00',
                'status' => 'On Time',
            ],
            [
                'route_name' => 'UOC FOT to Padukka',
                'route_number' => 'FOT-017',
                'start_point' => 'UOC FOT',
                'end_point' => 'Padukka',
                'departure_time' => '17:30:00',
                'arrival_time' => '18:30:00',
                'status' => 'On Time',
            ],
            [
                'route_name' => 'UOC FOT to Maharagama (Late)',
                'route_number' => 'FOT-018',
                'start_point' => 'UOC FOT',
                'end_point' => 'Maharagama',
                'departure_time' => '18:00:00',
                'arrival_time' => '18:45:00',
                'status' => 'On Time',
            ],
            [
                'route_name' => 'UOC FOT to Borella',
                'route_number' => 'FOT-019',
                'start_point' => 'UOC FOT',
                'end_point' => 'Borella',
                'departure_time' => '18:30:00',
                'arrival_time' => '19:30:00',
                'status' => 'On Time',
            ],
            [
                'route_name' => 'UOC FOT to Piliyandala',
                'route_number' => 'FOT-020',
                'start_point' => 'UOC FOT',
                'end_point' => 'Piliyandala',
                'departure_time' => '17:20:00',
                'arrival_time' => '18:10:00',
                'status' => 'On Time',
            ],
        ];

        foreach ($schedules as $schedule) {
            BusSchedule::create($schedule);
        }
    }
}
