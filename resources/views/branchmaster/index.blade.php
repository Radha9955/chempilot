@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>Branch List</h2>

    <a href="{{ route('branchmaster.create') }}" class="btn btn-primary mb-3">Add Branch</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Branch Code</th>
                <th>Branch Name</th>
                <th>City</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Is Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($branches as $branch)
                <tr>
                    <td>{{ $branch->BranchCode }}</td>
                    <td>{{ $branch->BranchName }}</td>
                    <td>{{ $branch->city->CityName ?? 'N/A' }}</td>
                    <td>{{ $branch->Phone }}</td>
                    <td>{{ $branch->Email }}</td>
                    <td>{{ $branch->IsActive ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('branchmaster.edit', $branch->ID) }}" class="btn btn-sm btn-info">Edit</a>
                        <form method="POST" action="{{ route('branchmaster.destroy', $branch->ID) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this branch?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $branches->links() }}
</div>
@endsection
