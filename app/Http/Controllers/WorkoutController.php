<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Http\Requests\StoreWorkoutRequest;
use App\Http\Requests\UpdateWorkoutRequest;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Dohvaćanje svih podataka iz tablice Workout
        $workouts=Workout::all();
        // Vraćanje view-a 'index' s podacima
        return view('workouts.index',['workouts'=>$workouts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('workouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkoutRequest $request)
    {
        $data=$request->validate([
            'name'=>'required|string|max:50',
            'description'=>'required|string|max:400',
            'difficulty'=>'required|string|max:50',
            'type'=>'required|string|max:50',
        ]);

        if(Workout::create($data)){
            return redirect()->route('workouts.index')->with('success', 'Workout created successfully');
        }
        return redirect()->route('workouts.index')->with('error', 'Error creating the workout: ' . $e->getMessage());
        

    }

    /**
     * Display the specified resource.
     */
    public function show(Workout $workout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workout $workout)
    {
        return view('workouts.edit', ['workout' => $workout]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkoutRequest $request, Workout $workout)
    {
        $data = $request->validate([
            'name' => 'required|unique:workouts,name,' . $workout->id . '|max:50',
            'description' => 'required|string|max:400',
            'difficulty' => 'required|string|max:50',
            'type' => 'required|string|max:50'
        ]);
        $workout->update($data);
        return redirect()->route('workouts.index')->with('success', 'Workout updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workout $workout)
    {
        $workout->delete();
        return redirect()->route('workouts.index')->with('success', 'Workout deleted successfully');
    }
}
