@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <h1>Brand Masters</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

  <div class="text-end mb-3">
    <a href="{{ route('brandmasters.create') }}" class="btn btn-primary">
        Add New Brand
    </a>
</div>




        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Brand Name</th>
                    <th>Brand Description</th>
                    <th>Is Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($brands as $brand)
                    <tr>
                        <td>{{ $brand->ID }}</td>
                        <td>{{ $brand->BrandName }}</td>
                        <td>{{ $brand->BrandDesc }}</td>
                        <td>{{ $brand->IsActive ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('brandmasters.edit', $brand->ID) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('brandmasters.destroy', $brand->ID) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this brand?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No brands found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination Links --}}
        <div class="d-flex justify-content-center">
            {!! $brands->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
