@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <h2>{{ isset($group) ? 'Edit Group' : 'Create Group' }}</h2>

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

        {{-- Form for Creating or Editing Group --}}
        <form method="POST" action="{{ isset($group) ? route('groupmasters.update', $group->ID) : route('groupmasters.store') }}">
            @csrf
            @if(isset($group)) @method('PUT') @endif

            {{-- Group Name Field --}}
            <div class="mb-3">
                <label for="GroupName" class="form-label">Group Name</label>
                <input type="text" id="GroupName" name="GroupName" class="form-control" 
                    value="{{ old('GroupName', $group->GroupName ?? '') }}" required>
            </div>

            {{-- Is Active Checkbox --}}
            <div class="form-check mb-3">
                <input type="checkbox" name="IsActive" value="1" class="form-check-input" 
                    {{ old('IsActive', $group->IsActive ?? false) ? 'checked' : '' }}>
                <label class="form-check-label" for="IsActive">Is Active</label>
            </div>

            {{-- Is NB Group Checkbox --}}
            <div class="form-check mb-3">
                <input type="checkbox" name="IsNBGroup" value="1" class="form-check-input" 
                    {{ old('IsNBGroup', $group->IsNBGroup ?? false) ? 'checked' : '' }}>
                <label class="form-check-label" for="IsNBGroup">Is NB Group</label>
            </div>

            {{-- Submit Button --}}
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">{{ isset($group) ? 'Update Group' : 'Save Group' }}</button>
                <a href="{{ route('groupmasters.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
git add .
>> git commit -m "changes in all view sand subgroup dropdown"
>> git push origin main