<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Workout extends Model
{
    use HasFactory;
    protected $table = 'user_workout'; // Pobrinite se da je naziv tablice ispravan
    //protected $primaryKey = ['user_id', 'workout_id'];
    protected $fillable=['user_id', 'workout_id'];
}
