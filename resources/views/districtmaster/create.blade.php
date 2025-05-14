@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>Add New District</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('districtmaster.store') }}">
        @csrf

        <div class="mb-3">
            <label for="DistrictName" class="form-label">District Name</label>
            <input type="text" class="form-control" name="DistrictName" id="DistrictName" value="{{ old('DistrictName') }}" required>
        </div>

     <div class="mb-3">
    <label for="StateID" class="form-label">State</label>
    <select class="form-control" name="StateID" id="StateID" required>
        <option disabled selected value="">-- Select State --</option>
        @foreach($states as $state)
            <option value="{{ $state->ID }}" {{ old('StateID') == $state->ID ? 'selected' : '' }}>
                {{ $state->StateName }}
            </option>
        @endforeach
    </select>
</div>


        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="IsActive" id="IsActive" {{ old('IsActive') ? 'checked' : '' }}>
            <label class="form-check-label" for="IsActive">Is Active</label>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('districtmaster.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
