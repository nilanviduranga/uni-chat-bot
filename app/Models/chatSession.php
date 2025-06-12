<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chatSession extends Model
{
    protected $fillable = [
        'user_id',
        'session_id',
        'title'
    ];
}
