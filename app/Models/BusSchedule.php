<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusSchedule extends Model
{
    protected $fillable = [
        'route_name',
        'start_point',
        'end_point',
        'departure_time',
        'arrival_time',
        'status',
    ];
}
