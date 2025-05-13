@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Edit Brand</h1>

        <form action="{{ route('brandmasters.update', $brand->ID) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="BrandName">Brand Name</label>
                <input type="text" name="BrandName" class="form-control" value="{{ $brand->BrandName }}" required>
            </div>

            <div class="form-group">
                <label for="BrandDesc">Brand Description</label>
                <input type="text" name="BrandDesc" class="form-control" value="{{ $brand->BrandDesc }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Brand</button>
        </form>
    </div>
@endsection