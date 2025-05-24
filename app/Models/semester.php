<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    protected $fillable = [
        'name',
    ];

    public function studentBatches()
    {
        return $this->hasMany(studentBatch::class, 'semester_id');
    }
}
