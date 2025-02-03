@extends('layouts.app')

@section('content')

<div class="container col-12">
    <div class="row">
        <div class="col-md-12 mb-5">
            <a href="{{ route('progress.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
    <form action="{{ route('progress.update', $progress->id) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- User Id --}}
        <div class="mb-3">
            <label for="user_id" class="form-label">User Id</label>
            <input
                type="text"
                class="form-control @error('user_id') is-invalid @enderror"
                id="user_id"
                name="user_id"
                value="{{ old('user_id', $progress->user_id) }}">
            @error('user_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- Measurement date --}}
        <div class="mb-3">
            <label for="measurement_date" class="form-label">measurement_date</label>
            <input type="date" class="form-control @error('measurement_date') is-invalid @enderror" id="measurement_date" 
                      name="measurement_date" value="{{ old('measurement_date', $progress->measurement_date) }}">
            @error('measurement_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- Weight --}}
        <div class="mb-3">
            <label for="weight" class="form-label">Weight</label>
            <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight"
                   step="0.1" min="0" value="{{ old('weight', $progress->weight) }}">
            @error('weight')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- Chest --}}
        <div class="mb-3">
            <label for="chest" class="form-label">Chest</label>
            <input type="number" class="form-control @error('chest') is-invalid @enderror" id="chest" name="chest"
                   step="0.1" min="0" value="{{ old('weight', $progress->chest) }}">
            @error('chest')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- Waist --}}
        <div class="mb-3">
            <label for="waist" class="form-label">Waist</label>
            <input type="number" class="form-control @error('waist') is-invalid @enderror" id="waist" name="waist"
                   step="0.1" min="0" value="{{ old('waist', $progress->waist) }}">
            @error('waist')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- Hip --}}
        <div class="mb-3">
            <label for="hip" class="form-label">Hip</label>
            <input type="number" class="form-control @error('hip') is-invalid @enderror" id="hip" name="hip"
                   step="0.1" min="0" value="{{ old('hip', $progress->hip) }}">
            @error('hip')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- Max bench --}}
        <div class="mb-3">
            <label for="max_bench" class="form-label">Max bench</label>
            <input type="number" class="form-control @error('max_bench') is-invalid @enderror" id="max_bench" name="max_bench"
                   step="0.1" min="0" value="{{ old('max_bench', $progress->max_bench) }}">
            @error('max_bench')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- Max deadlift --}}
        <div class="mb-3">
            <label for="max_deadlift" class="form-label">Max deadlift</label>
            <input type="number" class="form-control @error('max_deadlift') is-invalid @enderror" id="max_deadlift" name="max_deadlift"
                   step="0.1" min="0" value="{{ old('max_deadlift', $progress->max_deadlift) }}">
            @error('max_deadlift')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>                        
        {{-- Max squat --}}
        <div class="mb-3">
            <label for="max_squat" class="form-label">Max squat</label>
            <input type="number" class="form-control @error('max_squat') is-invalid @enderror" id="max_squat" name="max_squat"
                   step="0.1" min="0" value="{{ old('max_squat', $progress->max_squat) }}">
            @error('max_squat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>                           
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection