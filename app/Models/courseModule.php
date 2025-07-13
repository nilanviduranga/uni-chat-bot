<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class courseModule extends Model
{
    protected $fillable = [
        'course_code',
        'name',
        'lecturer',
        'credits',
        'status',
        'semester_id',
        'degree_programme_id',
    ];

    public function schedules()
    {
        return $this->hasMany(CourseModuleSchedule::class, 'course_code', 'course_code');
    }
}
