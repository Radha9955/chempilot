@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Add New Group</h2>

        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form for Creating Group --}}
        <form action="{{ route('groupmasters.store') }}" method="POST">
            @csrf

            {{-- Group Name Field --}}
            <div class="mb-3">
                <label for="GroupName" class="form-label">Group Name</label>
                <input type="text" name="GroupName" id="GroupName" class="form-control" 
                    value="{{ old('GroupName') }}" placeholder="Enter group name" required>
            </div>

            {{-- Is Active Field --}}
            <div class="mb-3">
                <label for="IsActive" class="form-label">Is Active?</label>
                <select name="IsActive" id="IsActive" class="form-select" required>
                    <option value="1" {{ old('IsActive') == '1' ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('IsActive') == '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>

            {{-- Is NB Group Field --}}
            <div class="mb-3">
                <label for="IsNBGroup" class="form-label">Is NB Group?</label>
                <select name="IsNBGroup" id="IsNBGroup" class="form-select" required>
                    <option value="1" {{ old('IsNBGroup') == '1' ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('IsNBGroup') == '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>

            {{-- Submit and Cancel Buttons --}}
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Save Group</button>
                <a href="{{ route('groupmasters.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
