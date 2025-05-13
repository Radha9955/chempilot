@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>State List</h2>
    <a href="{{ route('statemaster.create') }}" class="btn btn-primary mb-3">Add State</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>State Name</th>
                <th>Country ID</th>
                <th>GST Init</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($states as $state)
                <tr>
                    <td>{{ $state->ID }}</td>
                    <td>{{ $state->StateName }}</td>
                    <td>{{ $state->CountryID }}</td>
                    <td>{{ $state->GSTInit }}</td>
                    <td>{{ $state->IsActive ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('statemaster.edit', $state->ID) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('statemaster.destroy', $state->ID) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this state?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

 
</div>
@endsection
