<?php

namespace App\Http\Controllers;

use App\Models\User_Workout;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Http\Request;

class UserWorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_workout=User_Workout::all();

        return view('user_workout.index',['user_workout' => $user_workout]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id', 'first_name', 'last_name')->get(); // Prilagodite naziv stupca
        $workouts = Workout::pluck('name', 'id'); // Prilagodite naziv stupca
        return view('user_workout.create',compact('users', 'workouts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'user_id'=>'required|exists:users,id',
            'workout_id'=>'required|exists:workouts,id',
        ],[
            'user_id.exists' => 'Selected user does not exist.',
            'workout_id.exists' => 'Selected workout does not exist.',
        ]);

        if (User_Workout::create($data)){
            return redirect()->route('user_workout.index')->with('success', 'User_Workout created successfully');
        }

        return redirect()->route('user_workout.index')->with('error', 'Error creating the user_workout');
    }

    /**
     * Display the specified resource.
     */
    public function show(User_Workout $user_Workout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_id, $workout_id)
    {
        // Dohvati Exercise_Workout prema ID-jevima
        $user_workout = User_Workout::where('user_id', $user_id)
                ->where('workout_id', $workout_id)
                ->firstOrFail();

        
        // Dohvati sve vježbe (exercises)
        $users = User::select('id', 'first_name', 'last_name')->get(); // Prilagodite naziv stupca
        // Dohvati sve workout-ove
        $workouts = Workout::pluck('name', 'id');// Pretpostavljam da imaš Workout model za ove podatke

        // Proslijedi obje varijable u view
        return view('user_workout.edit', compact('user_workout', 'users', 'workouts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User_Workout $user_Workout)
    {
        $data = $request->validate([
            'user_id'=>'required|exists:users,id',
            'workout_id'=>'required|exists:workouts,id',
        ],[
            'user_id.exists' => 'Selected user does not exist.',
            'workout_id.exists' => 'Selected workout does not exist.',
        ]);

        $user_Workout->update($data);

        return redirect()->route('user_workout.index')->with('success', 'User_Workout updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id, $workout_id)
    {
        $deleted = User_Workout::where('user_id', $user_id)
                                ->where('workout_id', $workout_id)
                                ->delete();

        if (!$deleted) {
        return redirect()->route('user_workout.index')->with('error', 'User_Workout not found.');
        }

        return redirect()->route('user_workout.index')->with('success', 'User_Workout deleted successfully.');    
    }
}
