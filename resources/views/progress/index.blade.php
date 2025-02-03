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
        <a href="{{ route('progress.create') }}" class="btn btn-primary">Add Progress</a>
    </div>
</div>
{{-- @endif --}}

<table class="table table-striped">
    <thead>
        <th>Id</th>
        <th>User Id</th>
        <th>Measurement date</th>
        <th>Weight</th>
        <th>Chest</th>
        <th>Waist</th>
        <th>Hip</th>
        <th>Max bench</th>
        <th>Max deadlift</th>
        <th>Max squat</th>
    </thead>
<tbody>
    @foreach ($progress as $progress)
    <tr>
        <td>{{ $progress -> id}}</td>
        <td>{{ $progress -> user_id}}</td>
        <td>{{ $progress -> measurement_date}}</td>
        <td>{{ $progress -> weight}}</td>
        <td>{{ $progress -> chest}}</td>
        <td>{{ $progress -> waist}}</td>
        <td>{{ $progress -> hip}}</td>
        <td>{{ $progress -> max_bench}}</td>
        <td>{{ $progress -> max_deadlift}}</td>
        <td>{{ $progress -> max_squat}}</td>
        <td class="text-end">

                    <a href="{{ route('progress.edit', $progress->id) }}" class="btn btn-sm btn-outline-primary me-2">
                        Edit
                    </a>
                    
                    <form action="{{ route('progress.destroy', $progress->id) }}" method="POST" class="d-inline">
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