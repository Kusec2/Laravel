@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12 mb-5">
        <a href="{{ route('progress.index') }}" class="btn btn-secondary">Back</a>
</div>

<form action="{{ route('progress.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="user_id" class="form-label">User Id</label>
        <input type="number" class="form-control" id="user_id" name="user_id" required>
    </div>
    <div class="mb-3">
        <label for="measurement_date" class="form-label">Measurement date</label>
        <input type="date" class="form-control" id="measurement_date" name="measurement_date" required>
    </div>
    <div class="mb-3">
        <label for="weight" class="form-label">Weight (kg)</label>
        <input type="number" class="form-control" id="weight" name="weight" step="0.1" min="0"> 
    </div>
    <div class="mb-3">
        <label for="chest" class="form-label">Chest (cm)</label>
        <input type="number" class="form-control" id="chest" name="chest" step="0.1" min="0"> 
    </div>
    <div class="mb-3">
        <label for="waist" class="form-label">Waist (cm)</label>
        <input type="number" class="form-control" id="waist" name="waist" step="0.1" min="0"> 
    </div>
    <div class="mb-3">
        <label for="hip" class="form-label">Hip (cm)</label>
        <input type="number" class="form-control" id="hip" name="hip" step="0.1" min="0"> 
    </div>
    <div class="mb-3">
        <label for="max_bench" class="form-label">Max bench (kg)</label>
        <input type="number" class="form-control" id="max_bench" name="max_bench" step="0.1" min="0"> 
    </div>
    <div class="mb-3">
        <label for="max_deadlift" class="form-label">Max deadlift (kg)</label>
        <input type="number" class="form-control" id="max_deadlift" name="max_deadlift" step="0.1" min="0"> 
    </div>
    <div class="mb-3">
        <label for="max_squat" class="form-label">Max squat (kg)</label>
        <input type="number" class="form-control" id="max_squat" name="max_squat" step="0.1" min="0"> 
    </div>
    
    

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection