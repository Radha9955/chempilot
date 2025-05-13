@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>GST Master List</h1>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('gstmasters.create') }}" class="btn btn-primary">Create New GST Master</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>GST Name</th>
                    <th>From Amount</th>
                    <th>To Amount</th>
                    <th>Is Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gstMasters as $gstMaster)
                    <tr>
                        <td>{{ $gstMaster->ID }}</td>
                        <td>{{ $gstMaster->GSTName }}</td>
                        <td>{{ $gstMaster->FromAmount }}</td>
                        <td>{{ $gstMaster->ToAmount }}</td>
                        <td>{{ $gstMaster->IsActive ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('gstmasters.edit', $gstMaster->ID) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('gstmasters.destroy', $gstMaster->ID) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this GST Master?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $gstMasters->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
