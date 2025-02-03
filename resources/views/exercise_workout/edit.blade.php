@extends('layouts.app')

@section('content')

<div class="container col-12">
    <div class="row">
        <div class="col-md-12 mb-5">
            <a href="{{ route('exercise_workout.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <form action="{{ route('exercise_workout.update', ['exercise_id' => $exercise_workout->exercise_id, 
    'workout_id' => $exercise_workout->workout_id]) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Exercise --}}
        <div class="mb-3">
            <label for="exercise_id" class="form-label">Exercise</label>
            <select class="form-select @error('exercise_id') is-invalid @enderror" id="exercise_id" name="exercise_id">
                @foreach($exercises as $id => $name)
                    <option value="{{ $id }}" {{ old('exercise_id', $exercise_workout->exercise_id) == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
            @error('exercise_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Workout --}}
        <div class="mb-3">
            <label for="workout_id" class="form-label">Workout</label>
            <select class="form-select @error('workout_id') is-invalid @enderror" id="workout_id" name="workout_id">
                @foreach($workouts as $id => $name)
                    <option value="{{ $id}}" {{ old('workout_id', $exercise_workout->workout_id) == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
            @error('workout_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Order Number --}}
        <div class="mb-3">
            <label for="order_num" class="form-label">Order Number</label>
            <input type="number" class="form-control @error('order_num') is-invalid @enderror" id="order_num" name="order_num" value="{{ old('order_num', $exercise_workout->order_num) }}">
            @error('order_num')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Sets --}}
        <div class="mb-3">
            <label for="sets" class="form-label">Sets</label>
            <input type="number" class="form-control @error('sets') is-invalid @enderror" id="sets" name="sets" min="1" value="{{ old('sets', $exercise_workout->sets) }}">
            @error('sets')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Repetitions --}}
        <div class="mb-3">
            <label for="repetitions" class="form-label">Repetitions</label>
            <input type="number" class="form-control @error('repetitions') is-invalid @enderror" id="repetitions" name="repetitions" min="1" value="{{ old('repetitions', $exercise_workout->repetitions) }}">
            @error('repetitions')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Duration --}}
        <div class="mb-3">
            <label for="duration" class="form-label">Duration (in seconds)</label>
            <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" min="1" value="{{ old('duration', $exercise_workout->duration) }}">
            @error('duration')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
