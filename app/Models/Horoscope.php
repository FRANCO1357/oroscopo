<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horoscope extends Model
{
    protected $fillable = [
        'id', 'horoscope', 'date', 'sign',
    ];
}
