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
        <a href="{{ route('exercises.create') }}" class="btn btn-primary">Add Exercise</a>
    </div>
</div>
{{-- @endif --}}

<table class= "table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Type</th>
            <th>Repetitions</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        @foreach($exercises as $exercise)
        <tr>
            <td>{{ $exercise -> id }}</td>
            <td>{{ $exercise -> name }}</td>
            <td>{{ $exercise -> description }}</td>
            <td>{{ $exercise -> type }}</td>
            <td>{{ $exercise -> repetitions }}</td>
            <td>{{ $exercise -> duration }}</td>
            <td class="text-end">

                    <a href="{{ route('exercises.edit', $exercise->id) }}" class="btn btn-sm btn-outline-primary me-2">
                        Edit
                    </a>

                    
                    <form action="{{ route('exercises.destroy', $exercise->id) }}" method="POST" class="d-inline">
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