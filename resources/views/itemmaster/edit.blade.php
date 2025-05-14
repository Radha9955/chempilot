@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Item</h2>

    {{-- Display validation errors --}}
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
    <form method="POST" action="{{ route('itemmaster.update', $item->ID) }}">
        @csrf
        @method('PUT')

        {{-- Item Name Field --}}
        <div class="mb-3">
            <label for="ItemName" class="form-label">Item Name</label>
            <input type="text" class="form-control" name="ItemName" id="ItemName" value="{{ old('ItemName', $item->ItemName) }}" required>
        </div>

        {{-- Product Dropdown --}}
        <div class="mb-3">
            <label for="ProductID" class="form-label">Product</label>
            <select class="form-control" name="ProductID" id="ProductID" required>
                <option value="">-- Select Product --</option>
                @foreach($products as $product)
                    <option value="{{ $product->ID }}" {{ old('ProductID', $item->ProductID) == $product->ID ? 'selected' : '' }}>
                        {{ $product->ProductName }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Price Fields --}}
        <div class="mb-3">
            <label for="FromPrice" class="form-label">From Price</label>
            <input type="number" class="form-control" id="FromPrice" name="FromPrice" value="{{ old('FromPrice', $item->FromPrice) }}" required>
        </div>

        <div class="mb-3">
            <label for="ToPrice" class="form-label">To Price</label>
            <input type="number" class="form-control" id="ToPrice" name="ToPrice" value="{{ old('ToPrice', $item->ToPrice) }}" required>
        </div>

        {{-- Submit and Cancel Buttons --}}
        <button type="submit" class="btn btn-warning">Update Item</button>
        <a href="{{ route('itemmaster.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // This script will handle changes in Product dropdown or any other dynamic updates.
        $('#ProductID').change(function() {
            let productID = $(this).val();
            if (productID) {
                // Add any other dynamic actions if needed (e.g., loading specific data based on selected product)
            }
        });
    });
</script>
@endsection
