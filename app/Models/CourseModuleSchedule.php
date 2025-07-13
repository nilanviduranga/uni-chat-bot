<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseModuleSchedule extends Model
{

    protected $fillable = [
        'course_code',
        'class_date',
        'start_time',
        'end_time',
    ];


    public function module()
    {
        return $this->belongsTo(CourseModule::class, 'course_code', 'course_code');
    }
}
