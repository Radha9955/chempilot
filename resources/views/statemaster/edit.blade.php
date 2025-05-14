@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>Edit State</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('statemaster.update', $state->ID) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="StateName" class="form-label">State Name</label>
            <input type="text" class="form-control" name="StateName" id="StateName" value="{{ old('StateName', $state->StateName) }}" required>
        </div>

       <div class="mb-3">
            <label for="CountryID" class="form-label">Country</label>
            <select name="CountryID" id="CountryID" class="form-select" required>
                <option value="" disabled selected>-- Select Country --</option>
                @foreach($countries as $country)
                    <option value="{{ $country->ID }}" 
                        {{ old('CountryID', $state->CountryID) == $country->ID ? 'selected' : '' }}>
                        {{ $country->CountryName }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="GSTInit" class="form-label">GST Init</label>
            <input type="text" class="form-control" name="GSTInit" id="GSTInit" value="{{ old('GSTInit', $state->GSTInit) }}">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="IsActive" id="IsActive" value="1" {{ old('IsActive', $state->IsActive) ? 'checked' : '' }}>
            <label class="form-check-label" for="IsActive">Is Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('statemaster.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
