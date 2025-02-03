<?php

namespace App\Http\Controllers;

use App\Models\Exercise_Workout;
use App\Models\Exercise;
use App\Models\Workout;
use Illuminate\Http\Request;

class ExerciseWorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exercise_workout=Exercise_Workout::all();

        return view ('exercise_workout.index', ['exercise_workout' => $exercise_workout]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exercises = Exercise::pluck('name', 'id'); // Prilagodite naziv stupca
        $workouts = Workout::pluck('name', 'id'); // Prilagodite naziv stupca
        return view ('exercise_workout.create', compact('exercises', 'workouts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'exercise_id'=>'required|exists:exercises,id',
            'workout_id'=>'required|exists:workouts,id',
            'order_num'=>'required|numeric',
            'sets'=>'required|numeric',
            'repetitions'=>'nullable|numeric',
            'duration'=>'nullable|numeric'
        ],[
            'exercise_id.exists' => 'Selected exercise does not exist.',
            'workout_id.exists' => 'Selected workout does not exist.',
        ]);

        if (Exercise_Workout::create($data)){
            return redirect()->route('exercise_workout.index')->with('success', 'Exercise_Workout created successfully');
        }

        return redirect()->route('exercise_workout.index')->with('error', 'Error creating the exercise_workout');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercise_Workout $exercise_Workout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($exercise_id, $workout_id)
    {
        // Dohvati Exercise_Workout prema ID-jevima
        $exercise_workout = Exercise_Workout::where('exercise_id', $exercise_id)
            ->where('workout_id', $workout_id)
            ->firstOrFail();

    
        // Dohvati sve vježbe (exercises)
        $exercises = Exercise::all()->pluck('name', 'id');
        // Dohvati sve workout-ove
        $workouts = Workout::pluck('name', 'id');  // Pretpostavljam da imaš Workout model za ove podatke

        // Proslijedi obje varijable u view
        return view('exercise_workout.edit', compact('exercise_workout', 'exercises', 'workouts'));

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exercise_Workout $exercise_Workout)
    {
        $data = $request->validate([
            'exercise_id'=>'required|exists:exercises,id',
            'workout_id'=>'required|exists:workouts,id',
            'order_num' => 'required|integer',
            'sets' => 'required|integer|min:1',
            'repetitions' => 'nullable|integer|min:1',
            'duration' => 'nullable|integer|min:1',
            'weight' => 'nullable|numeric|min:0',
        ],[
            'exercise_id.exists' => 'Selected exercise does not exist.',
            'workout_id.exists' => 'Selected workout does not exist.',
        ]);

        $exercise_Workout->update($data);

        return redirect()->route('exercise_workout.index')->with('success', 'Exercise_Workout updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($exercise_id,$workout_id)
    {
        $deleted = Exercise_Workout::where('exercise_id', $exercise_id)
                                ->where('workout_id', $workout_id)
                                ->delete();

        if(!$deleted){
            return redirect()->route('exercise_workout.index')->with('error', 'Exercise_Workout not found');
        }

        return redirect()->route('exercise_workout.index')->with('success','Exercise_Workout deleted successfully');
    }
}
