<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class studentBatch extends Model
{
    protected $fillable = [
        'batch_code',
        'semester_id',
    ];

    function users()
    {
        return $this->hasMany(User::class, 'batch_id');
    }
    function semester()
    {
        return $this->belongsTo(semester::class, 'semester_id');
    }
}
