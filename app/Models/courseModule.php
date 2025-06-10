<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class courseModule extends Model
{
    protected $fillable = [
        'course_code',
        'name',
        'credits',
        'status',
        'semester_id',
        'degree_programme_id',
    ];


}
