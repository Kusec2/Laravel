@extends('layouts.app')

@section('content')

<div class="container col-12">
    <div class="row">
        <div class="col-md-12 mb-5">
            <a href="{{ route('exercises.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
    <form action="{{ route('exercises.update', $exercise->id) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                name="name"
                value="{{ old('name', $exercise->name) }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- Description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" 
                      name="description">{{ old('description', $exercise->description) }}</textarea>
            @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- Type --}}
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type"
                   value="{{ old('type', $exercise->type) }}">
            @error('type')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- Repetitions --}}
        <div class="mb-3">
            <label for="repetitions" class="form-label">Repetitions</label>
            <input type="number" class="form-control @error('difficulty') is-invalid @enderror" id="repetitions" name="repetitions"
                        step="1" min="0" value="{{ old('repetitions', $exercise->repetitions) }}">
            @error('repetitions')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- Duration --}}
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration"
                        step="1" min="0" value="{{ old('duration', $exercise->duration) }}">
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