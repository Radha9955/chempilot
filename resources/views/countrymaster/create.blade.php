@extends('layouts.layout')

@section('content')
<div class="container">
    <h2>{{ isset($country) ? 'Edit Country' : 'Add Country' }}</h2>

    <form action="{{ isset($country) ? route('countrymaster.update', $country->ID) : route('countrymaster.store') }}" method="POST">
        @csrf
        @if(isset($country)) @method('PUT') @endif

        <div class="form-group mb-3">
            <label for="CountryName">Country Name</label>
            <input type="text" name="CountryName" id="CountryName" class="form-control" 
                   value="{{ old('CountryName', $country->CountryName ?? '') }}" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="IsActive" id="IsActive" class="form-check-input" value="1" 
                   {{ old('IsActive', $country->IsActive ?? false) ? 'checked' : '' }}>
            <label for="IsActive" class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('countrymaster.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
