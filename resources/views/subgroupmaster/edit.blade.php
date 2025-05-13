@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Sub Group</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('subgroupmaster.update', $subGroup->ID) }}">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="SubGroupName">SubGroup Name</label>
            <input type="text" name="SubGroupName" id="SubGroupName" class="form-control"
                   value="{{ old('SubGroupName', $subGroup->SubGroupName) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="GroupID">Group Name</label>
            <select name="GroupID" id="GroupID" class="form-control" required>
                <option value="">-- Select Group --</option>
                @foreach($groups as $group)
                    <option value="{{ $group->ID }}" 
                        {{ old('GroupID', $subGroup->GroupID) == $group->ID ? 'selected' : '' }}>
                        {{ $group->GroupName }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="DiscountPct">Discount (%)</label>
            <input type="number" step="0.01" name="DiscountPct" id="DiscountPct" class="form-control"
                   value="{{ old('DiscountPct', $subGroup->DiscountPct) }}">
        </div>

        <div class="form-group mb-3">
            <label for="TaxPct">Tax (%)</label>
            <input type="number" step="0.01" name="TaxPct" id="TaxPct" class="form-control"
                   value="{{ old('TaxPct', $subGroup->TaxPct) }}">
        </div>

        <div class="form-group mb-3 form-check">
            <input type="checkbox" name="IsActive" value="1" id="IsActive" class="form-check-input"
                   {{ old('IsActive', $subGroup->IsActive) ? 'checked' : '' }}>
            <label class="form-check-label" for="IsActive">Is Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Update Sub Group</button>
        <a href="{{ route('subgroupmaster.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
