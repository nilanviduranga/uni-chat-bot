<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseModuleSchedule extends Model
{

    protected $fillable = [
        'module_id',
        'lecturer',
        'class_date',
        'start_time',
        'end_time',
    ];


    public function module()
    {
        return $this->belongsTo(CourseModule::class, 'module_id');
    }
}
