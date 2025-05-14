@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>City List</h2>
    <a href="{{ route('citymaster.create') }}" class="btn btn-primary mb-3">Add City</a>

    <!-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>City Name</th>
                <th>District</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cities as $city)
                <tr>
                    <td>{{ $city->ID }}</td>
                    <td>{{ $city->CityName }}</td>
                    <td>{{ $city->district->DistrictName }}</td>
                    <td>{{ $city->IsActive ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('citymaster.edit', $city->ID) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('citymaster.destroy', $city->ID) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this city?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
