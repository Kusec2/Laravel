<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Http\Requests\StoreExerciseRequest;
use App\Http\Requests\UpdateExerciseRequest;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exercises=Exercise::all();

        return view('exercises.index', ['exercises'=> $exercises]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('exercises.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExerciseRequest $request)
    {
        $data=$request->validate([
            'name'=>'required|string|max:50',
            'description'=>'required|string|max:700',
            'type'=>'required|string|max:50',
            'repetitions'=>'nullable|numeric',
            'duration'=>'nullable|numeric'
        ]);

        if (Exercise::create($data)){
            return redirect()->route('exercises.index')->with('success', 'Exercise created successfully');
        }
        return redirect()->route('exercises.index')->with('error', 'Error creating the exercise');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercise $exercise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercise $exercise)
    {
        return view('exercises.edit', ['exercise'=>$exercise]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExerciseRequest $request, Exercise $exercise)
    {
        $data=$request->validate([
            'name'=>'required|string|max:50',
            'description'=>'required|string|max:700',
            'type'=>'required|string|max:50',
            'repetitions'=>'nullable|numeric',
            'duration'=>'nullable|numeric'
        ]);

        $exercise->update($data);
        return redirect()->route('exercises.index')->with('success', 'Exercise updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return redirect()->route('exercises.index')->with('success','Exercise deleted successfully');
    }
}
