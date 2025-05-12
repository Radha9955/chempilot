<!-- resources/views/itemmaster/show.blade.php -->

@extends('layouts.layout')

@section('title', 'View Item')

@section('content')
    <h2>View Item</h2>

    <div class="card">
        <div class="card-header">
            <h3>Item Details</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>ID:</strong> {{ $item->ID }}</p>
                    <p><strong>Item Name:</strong> {{ $item->ItemName }}</p>
                    <p><strong>Product ID:</strong> {{ $item->ProductID }}</p>
                    <p><strong>Price Range:</strong> {{ $item->FromPrice }} - {{ $item->ToPrice }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Description:</strong> {{ $item->Description ?? 'No description available' }}</p>
                    <p><strong>Stock Quantity:</strong> {{ $item->StockQuantity ?? 'N/A' }}</p>
                    <p><strong>Created At:</strong> {{ $item->created_at->format('d-m-Y H:i') }}</p>
                    <p><strong>Updated At:</strong> {{ $item->updated_at->format('d-m-Y H:i') }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('itemmaster.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('itemmaster.edit', $item->ID) }}" class="btn btn-primary">Edit Item</a>
        </div>
    </div>
@endsection
