<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CafeteriaMenu extends Model
{
    protected $fillable = [
        'meal_type',
        'menu_item',
        'description',
        'price',
        'status',
    ];

}
