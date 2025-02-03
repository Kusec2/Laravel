<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;
    protected $fillable = ['measurement_date',
    'weight', 
    'chest', 
    'waist', 
    'hip', 
    'user_id', 
    'max_bench',
    'max_deadlift',
    'max_squat'
];
}
