<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise_Workout extends Model
{
    use HasFactory;
    // Ako je naziv tablice 'exercise_workout', eksplicitno postavite naziv tablice u modelu
    protected $table = 'exercise_workout'; // Pobrinite se da je naziv tablice ispravan
    protected $fillable = ['exercise_id','workout_id','order_num', 'sets', 'repetitions', 'duration'];
}
