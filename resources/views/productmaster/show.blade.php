{{-- resources/views/productmaster/show.blade.php --}}
@extends('layouts.layout')

@section('title', 'View Product')

@section('content')
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Product Details</h4>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Product Name</dt>
                <dd class="col-sm-9">{{ $product->ProductName }}</dd>

                <dt class="col-sm-3">Sub Group</dt>
                <dd class="col-sm-9">{{ $product->subgroup->SubGroupName ?? 'N/A' }}</dd>

                <dt class="col-sm-3">Group</dt>
                <dd class="col-sm-9">{{ $product->GroupName ?? 'N/A' }}</dd>

                <dt class="col-sm-3">Is Active</dt>
                <dd class="col-sm-9">{{ $product->IsActive ? 'Yes' : 'No' }}</dd>

                <dt class="col-sm-3">Created By</dt>
                <dd class="col-sm-9">{{ $product->CreatedBy }}</dd>

                <dt class="col-sm-3">Created Date</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($product->created_at)->format('Y-m-d H:i') }}</dd>

                <dt class="col-sm-3">Modified By</dt>
                <dd class="col-sm-9">{{ $product->ModifiedBy ?? '-' }}</dd>

                <dt class="col-sm-3">Modified Date</dt>
                <dd class="col-sm-9">{{ $product->ModifiedDate ? \Carbon\Carbon::parse($product->ModifiedDate)->format('Y-m-d H:i') : '-' }}</dd>
            </dl>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('productmaster.index') }}" class="btn btn-secondary" title="Back to Product List">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
            <a href="{{ route('productmaster.edit', $product->ID) }}" class="btn btn-primary" title="Edit Product">
                <i class="bi bi-pencil"></i> Edit
            </a>
        </div>
    </div>
@endsection
