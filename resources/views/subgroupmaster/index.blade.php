@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h1>SubGroupMaster List</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('subgroupmaster.create') }}" class="btn btn-primary mb-3">Create New SubGroup</a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Sub Group Name</th>
                <th>Group ID</th>
                <th>Discount %</th>
                <th>Tax %</th>
                <th>Is Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($subGroups as $subGroup)
            <tr>
                <td>{{ $subGroup->ID }}</td>
                <td>{{ $subGroup->SubGroupName }}</td>
                <td>{{ $subGroup->GroupID }}</td>
                <td>{{ $subGroup->DiscountPct }}</td>
                <td>{{ $subGroup->TaxPct }}</td>
                <td>{{ $subGroup->IsActive ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('subgroupmaster.edit', $subGroup->ID) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('subgroupmaster.destroy', $subGroup->ID) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this Sub Group?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No Sub Groups found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $subGroups->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection
