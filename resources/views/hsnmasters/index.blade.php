@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>HSN Master List</h1>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('hsnmasters.create') }}" class="btn btn-primary">Create New HSN Master</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>HSN Name</th>
                    <th>GST ID</th>
                    <th>Is Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hsnMasters as $hsnMaster)
                    <tr>
                        <td>{{ $hsnMaster->ID }}</td>
                        <td>{{ $hsnMaster->HSNName }}</td>
                        <td>{{ $hsnMaster->GSTID }}</td>
                        <td>{{ $hsnMaster->IsActive ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('hsnmasters.edit', $hsnMaster->ID) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('hsnmasters.destroy', $hsnMaster->ID) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this HSN Master?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {!! $hsnMasters->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
