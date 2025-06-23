<?php

namespace App\Models;
use App\Models\courseModule;

use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    protected $fillable = [
        'user_id',
        'module_id',
        'facing_year',
        'grade',
    ];


    public function courseModule()
    {
        return $this->belongsTo(courseModule::class, 'module_id', 'course_code');
    }
}
