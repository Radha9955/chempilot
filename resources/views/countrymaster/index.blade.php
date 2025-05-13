@extends('layouts.layout')

@section('content')
<div class="container">
    <h2>Country List</h2>
    <a href="{{ route('countrymaster.create') }}" class="btn btn-primary mb-3">Add Country</a>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Active</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($countries as $country)
                <tr>
                    <td>{{ $country->ID }}</td>
                    <td>{{ $country->CountryName }}</td>
                    <td>{{ $country->IsActive ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('countrymaster.edit', $country->ID) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('countrymaster.destroy', $country->ID) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $countries->links() }}
</div>
@endsection
