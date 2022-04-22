<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher_availabilities extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'account_id',
        'day_id',
        'start_time',
        'end_time',
        'semester_id'
    ];

}
