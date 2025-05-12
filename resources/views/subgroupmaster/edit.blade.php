@extends('layouts.layout') {{-- Adjust to your layout --}}

@section('content')
<div class="container">
    <h2>{{ isset($subGroup) ? 'Edit Sub Group' : 'Create Sub Group' }}</h2>

    {{-- Show validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Edit form --}}
    <form method="POST" 
          action="{{ isset($subGroup) ? route('subgroupmaster.update', $subGroup->ID) : route('subgroupmaster.store') }}">
        @csrf
        @if(isset($subGroup)) 
            @method('PUT') 
        @endif

        <div class="mb-3">
            <label for="SubGroupName" class="form-label">Sub Group Name</label>
            <input type="text" class="form-control" id="SubGroupName" name="SubGroupName" 
                   value="{{ old('SubGroupName', $subGroup->SubGroupName ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="GroupID" class="form-label">Group ID</label>
            <input type="number" class="form-control" id="GroupID" name="GroupID" 
                   value="{{ old('GroupID', $subGroup->GroupID ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="DiscountPct" class="form-label">Discount %</label>
            <input type="number" step="0.01" class="form-control" id="DiscountPct" name="DiscountPct" 
                   value="{{ old('DiscountPct', $subGroup->DiscountPct ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="TaxPct" class="form-label">Tax %</label>
            <input type="number" step="0.01" class="form-control" id="TaxPct" name="TaxPct" 
                   value="{{ old('TaxPct', $subGroup->TaxPct ?? '') }}">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="IsActive" name="IsActive" value="1" 
                   {{ old('IsActive', $subGroup->IsActive ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="IsActive">Active</label>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($subGroup) ? 'Update' : 'Save' }}
        </button>
        <a href="{{ route('subgroupmaster.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
