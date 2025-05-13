@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>District List</h2>
    <a href="{{ route('districtmaster.create') }}" class="btn btn-primary mb-3">Add District</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>District Name</th>
                <th>State ID</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($districts as $district)
                <tr>
                    <td>{{ $district->ID }}</td>
                    <td>{{ $district->DistrictName }}</td>
                    <td>{{ $district->StateID }}</td>
                    <td>{{ $district->IsActive ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('districtmaster.edit', $district->ID) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('districtmaster.destroy', $district->ID) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this district?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $districts->links() }}
</div>
@endsection
