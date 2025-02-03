@extends('layouts.app')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('content')
{{-- @if(auth()->user()->is_admin) --}}
<div class="row">
    <div class="col-md-12 mb-3">
        <a href="{{ route('exercise_workout.create') }}" class="btn btn-primary">Add Exercise_Workout</a>
    </div>
</div>
{{-- @endif --}}

<table class="table table-striped">
    <thead>
        <tr>
            <th>Exercise Id</th>
            <th>Workout Id</th>
            <th>Order number</th>
            <th>Sets</th>
            <th>Repetitions</th>
            <th>Duration</th>
        </tr>
    </thead>
<tbody>  
      </div>    
    @foreach ($exercise_workout as $exercise_workout)
    <tr>
        <td>{{ $exercise_workout -> exercise_id}}</td>
        <td>{{ $exercise_workout -> workout_id}}</td>
        <td>{{ $exercise_workout -> order_num}}</td>
        <td>{{ $exercise_workout -> sets}}</td>
        <td>{{ $exercise_workout -> repetitions}}</td>
        <td>{{ $exercise_workout -> duration}}</td>
        <td class="text-end">

            <a href="{{ route('exercise_workout.edit', ['exercise_id' => $exercise_workout->exercise_id, 'workout_id' => $exercise_workout->workout_id]) }}" 
                class="btn btn-sm btn-outline-primary me-2">
                Edit
             </a>
                    
                    <form action="{{ route('exercise_workout.destroy',['exercise_id'=>$exercise_workout->exercise_id, 'workout_id'=>$exercise_workout->workout_id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection