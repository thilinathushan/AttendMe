<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'Department',
        'year',
        'sem',
        'Module',
        'start_t',
        'end_t',
        'Day'

    ];
}
