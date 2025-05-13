@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Branch</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('branchmaster.update', $branch->ID) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Branch Code</label>
            <input type="text" name="BranchCode" class="form-control" value="{{ $branch->BranchCode }}" required>
        </div>

        <div class="mb-3">
            <label>Branch Name</label>
            <input type="text" name="BranchName" class="form-control" value="{{ $branch->BranchName }}" required>
        </div>

        <div class="mb-3">
            <label>City</label>
            <select name="CityID" class="form-control" required>
                <option value="">Select City</option>
                @foreach($cities as $city)
                    <option value="{{ $city->ID }}" {{ $branch->CityID == $city->ID ? 'selected' : '' }}>
                        {{ $city->CityName }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="Phone" class="form-control" value="{{ $branch->Phone }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="Email" class="form-control" value="{{ $branch->Email }}">
        </div>

        <div class="mb-3">
            <label>Is Active</label>
            <select name="IsActive" class="form-control">
                <option value="1" {{ $branch->IsActive ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$branch->IsActive ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Branch</button>
        <a href="{{ route('branchmaster.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
