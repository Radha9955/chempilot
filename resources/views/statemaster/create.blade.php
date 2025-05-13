@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>Add New State</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('statemaster.store') }}">
        @csrf

        <div class="mb-3">
            <label for="StateName" class="form-label">State Name</label>
            <input type="text" class="form-control" name="StateName" id="StateName" value="{{ old('StateName') }}" required>
        </div>

        <div class="mb-3">
            <label for="CountryID" class="form-label">Country ID</label>
            <input type="number" class="form-control" name="CountryID" id="CountryID" value="{{ old('CountryID') }}" required>
        </div>

        <div class="mb-3">
            <label for="GSTInit" class="form-label">GST Init</label>
            <input type="text" class="form-control" name="GSTInit" id="GSTInit" value="{{ old('GSTInit') }}">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="IsActive" id="IsActive" {{ old('IsActive') ? 'checked' : '' }}>
            <label class="form-check-label" for="IsActive">Is Active</label>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('statemaster.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
