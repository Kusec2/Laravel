<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use App\Http\Requests\StoreProgressRequest;
use App\Http\Requests\UpdateProgressRequest;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progress=Progress::all();

        return view('progress.index', ['progress'=> $progress]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('progress.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgressRequest $request)
    {
        $data = $request->validate([
            'measurement_date'=>'required|date',
            'user_id'=>'required|numeric',
            'weight'=>'nullable|numeric',
            'chest'=>'nullable|numeric',
            'waist'=>'nullable|numeric',
            'hip'=>'nullable|numeric',
            'max_bench'=>'nullable|numeric',
            'max_deadlift'=>'nullable|numeric',
            'max_squat'=>'nullable|numeric'
            
        ]);

        if (Progress::create($data)) {
            return redirect()->route('progress.index')->with('success', 'Progress created successfully');
        }
        return redirect()->route('progress.index')->with('error', 'Error creating the progress');
    }

    /**
     * Display the specified resource.
     */
    public function show(Progress $progress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Progress $progress)
    {
        return view('progress.edit', ['progress'=>$progress]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgressRequest $request, Progress $progress)
    {
        $data = $request->validate([
            'measurement_date'=>'required|date',
            'user_id'=>'required|numeric',
            'weight'=>'nullable|numeric',
            'chest'=>'nullable|numeric',
            'waist'=>'nullable|numeric',
            'hip'=>'nullable|numeric',
            'max_bench'=>'nullable|numeric',
            'max_deadlift'=>'nullable|numeric',
            'max_squat'=>'nullable|numeric'
            
        ]);

        $progress->update($data);

        return redirect()->route('progress.index')->with('success', 'Progress updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Progress $progress)
    {
        $progress->delete();
        return redirect()->route('progress.index')->with('success','Progress deleted successfully');
    }
}
