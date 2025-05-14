@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <h1>Company List</h1>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Error Message --}}
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- Add New Company Button --}}
       <a href="{{ route('companymasters.create') }}" class="btn btn-primary mb-3">Add New Company</a>


        {{-- Company Table --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Company ID</th>
                    <th>Company Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($companies as $company)
                    <tr>
                        <td>{{ $company->ID }}</td>
                        <td>{{ $company->CompanyName }}</td>
                        <td>
                            <a href="{{ route('companymasters.edit', $company->ID) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('companymasters.destroy', $company->ID) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this company?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No companies found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            <!-- {!! $companies->links('pagination::bootstrap-5') !!} -->
            {{ $companies->links() }}
        </div>
    </div>
@endsection
