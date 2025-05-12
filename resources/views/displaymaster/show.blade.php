@extends('layouts.layout')

@section('title', 'Display Details')

@section('content')
<div class="container mt-4">
    <h2>Display Details</h2>

    <div class="mb-2">
        <strong>ID:</strong> {{ $display->ID }}
    </div>

    <div class="mb-2">
        <strong>Display Name:</strong> {{ $display->DisplayName }}
    </div>

    <div class="mb-2">
        <strong>Item ID:</strong> {{ $display->ItemID }}
    </div>

    <div class="mb-2">
        <strong>Branch ID:</strong> {{ $display->BranchID }}
    </div>

    <div class="mb-2">
        <strong>Is Active:</strong> {{ $display->IsActive ? 'Yes' : 'No' }}
    </div>

    <div class="mb-2">
        <strong>Created At:</strong> {{ $display->CreatedDate }}
    </div>

    <div class="mb-2">
        <strong>Modified At:</strong> {{ $display->ModifiedDate }}
    </div>

    <a href="{{ route('displaymaster.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
