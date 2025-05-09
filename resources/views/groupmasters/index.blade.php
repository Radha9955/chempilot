@extends('layouts.layout')

@section('title', 'Group Master List')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Group Master List</h2>
        <a href="{{ route('groupmasters.create') }}" class="btn btn-primary">Add New Group</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($groups->isEmpty())
        <div class="alert alert-info">No group records found.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Group Name</th>
                    <th>Is Active</th>
                    <th>Is NB Group</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td>{{ $group->ID }}</td>
                        <td>{{ $group->GroupName }}</td>
                        <td>{{ $group->IsActive ? 'Yes' : 'No' }}</td>
                        <td>{{ $group->IsNBGroup ? 'Yes' : 'No' }}</td>
                        <td>{{ $group->CreatedDate ? \Carbon\Carbon::parse($group->CreatedDate)->format('d-m-Y') : '-' }}</td>
                        <td>
                            <a href="{{ route('groupmasters.edit', $group->ID) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('groupmasters.destroy', $group->ID) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this group?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
