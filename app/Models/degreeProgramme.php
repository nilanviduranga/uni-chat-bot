<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class degreeProgramme extends Model
{
    protected $fillable = [
        'name',
        'duration',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(department::class, 'department_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'degree_programme_id');
    }
}
