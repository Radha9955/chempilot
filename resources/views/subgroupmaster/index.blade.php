@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>SubGroupMaster List</h1>
    <a href="{{ route('subgroupmaster.create') }}" class="btn btn-primary">Create New SubGroup</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>SubGroupName</th>
                <th>GroupID</th>
                <th>DiscountPct</th>
                <th>TaxPct</th>
                <th>IsActive</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subGroups as $subGroup)
            <tr>
                <td>{{ $subGroup->ID }}</td>
                <td>{{ $subGroup->SubGroupName }}</td>
                <td>{{ $subGroup->GroupID }}</td>
                <td>{{ $subGroup->DiscountPct }}</td>
                <td>{{ $subGroup->TaxPct }}</td>
                <td>{{ $subGroup->IsActive ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('subgroupmaster.edit', $subGroup->ID) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('subgroupmaster.destroy', $subGroup->ID) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
