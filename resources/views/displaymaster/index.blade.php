@extends('layouts.layout')

@section('title', 'Display Master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Display Master List</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('displaymaster.create') }}" class="btn btn-primary mb-3">Add New Display</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Display Name</th>
                <th>Item ID</th>
                <th>Branch ID</th>
                <th>Is Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($displays as $display)
                <tr>
                    <td>{{ $display->ID }}</td>
                    <td>{{ $display->DisplayName }}</td>
                    <td>{{ $display->ItemID }}</td>
                    <td>{{ $display->BranchID }}</td>
                    <td>{{ $display->IsActive ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('displaymaster.show', $display->ID) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('displaymaster.edit', $display->ID) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('displaymaster.destroy', $display->ID) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $displays->links() }}
</div>
@endsection
