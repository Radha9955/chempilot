<!-- resources/views/itemmaster/create.blade.php -->
@extends('layouts.layout') 

@section('title', 'Create Item')

@section('content')
    <h2>Create New Item</h2>

    <form action="{{ route('itemmaster.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="ItemName" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="ItemName" name="ItemName" required>
        </div>

        <div class="mb-3">
            <label for="ProductID" class="form-label">Product</label>
            <select class="form-control" id="ProductID" name="ProductID" required>
                <option value="">-- Select Product --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->ProductName }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="FromPrice" class="form-label">From Price</label>
            <input type="number" class="form-control" id="FromPrice" name="FromPrice" required>
        </div>

        <div class="mb-3">
            <label for="ToPrice" class="form-label">To Price</label>
            <input type="number" class="form-control" id="ToPrice" name="ToPrice" required>
        </div>

        <button type="submit" class="btn btn-success">Create Item</button>
    </form>
@endsection
