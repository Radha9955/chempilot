@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Country</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('countrymaster.update', $country->ID) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="CountryName">Country Name</label>
            <input type="text" name="CountryName" id="CountryName" class="form-control"
                   value="{{ old('CountryName', $country->CountryName) }}" required>
        </div>

        <div class="form-group form-check mb-3">
            <input type="checkbox" name="IsActive" id="IsActive" class="form-check-input" value="1"
                   {{ old('IsActive', $country->IsActive) ? 'checked' : '' }}>
            <label for="IsActive" class="form-check-label">Is Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Update Country</button>
        <a hr
