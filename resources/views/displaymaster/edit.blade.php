@extends('layouts.layout')

@section('title', 'Edit Display')

@section('content')
<div class="container mt-4">
    <h2>Edit Display</h2>
    <form method="POST" action="{{ route('displaymaster.update', $display->ID) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="DisplayName" class="form-label">Display Name</label>
            <input type="text" name="DisplayName" class="form-control" value="{{ old('DisplayName', $display->DisplayName) }}" required>
        </div>

       <div class="form-group mb-3">
    <label for="ItemID">Item</label>
    <select name="ItemID" id="ItemID" class="form-control" required>
        <option value="">-- Select Item --</option>
        @foreach($items as $item)
            <option value="{{ $item->ID }}" 
                {{ old('ItemID', $display->ItemID ?? '') == $item->ID ? 'selected' : '' }}>
                {{ $item->ItemName }}
            </option>
        @endforeach
    </select>
</div>

        <div class="mb-3">
            <label for="BranchID" class="form-label">Branch ID</label>
            <input type="number" name="BranchID" class="form-control" value="{{ old('BranchID', $display->BranchID) }}" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="IsActive" value="1" class="form-check-input" {{ $display->IsActive ? 'checked' : '' }}>
            <label class="form-check-label">Is Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('displaymaster.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
