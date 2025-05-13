@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <h2>Add New Brand</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('brandmasters.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="BrandName">Brand Name</label>
                <input type="text" name="BrandName" id="BrandName" class="form-control" value="{{ old('BrandName') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="BrandDesc">Brand Description</label>
                <input type="text" name="BrandDesc" id="BrandDesc" class="form-control" value="{{ old('BrandDesc') }}" required>
            </div>

            <button type="submit" class="btn btn-success">Save Brand</button>
            <a href="{{ route('brandmasters.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
