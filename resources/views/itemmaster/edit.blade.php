<!-- resources/views/itemmaster/edit.blade.php -->
@extends('layouts.layout') 
@section('title', 'Edit Item')

@section('content')
    <h2>Edit Item</h2>

    <form action="{{ route('itemmaster.update', $item->ID) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="ItemName" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="ItemName" name="ItemName" value="{{ $item->ItemName }}" required>
        </div>
        <div class="mb-3">
            <label for="ProductID" class="form-label">Product ID</label>
            <input type="text" class="form-control" id="ProductID" name="ProductID" value="{{ $item->ProductID }}" required>
        </div>
        <div class="mb-3">
            <label for="FromPrice" class="form-label">From Price</label>
            <input type="number" class="form-control" id="FromPrice" name="FromPrice" value="{{ $item->FromPrice }}" required>
        </div>
        <div class="mb-3">
            <label for="ToPrice" class="form-label">To Price</label>
            <input type="number" class="form-control" id="ToPrice" name="ToPrice" value="{{ $item->ToPrice }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Update Item</button>
    </form>
@endsection
