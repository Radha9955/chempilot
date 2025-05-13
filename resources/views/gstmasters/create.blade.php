@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Create New GST Master</h1>
     <form action="{{ route('hsnmasters.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="HSNName" class="form-label">HSN Name</label>
        <input type="text" class="form-control" id="HSNName" name="HSNName" required>
    </div>

    <div class="mb-3">
        <label for="GSTID" class="form-label">GST ID</label>
        <input type="number" class="form-control" id="GSTID" name="GSTID">
    </div>

    <div class="mb-3">
        <label for="IsActive" class="form-label">Is Active</label>
        <input type="checkbox" id="IsActive" name="IsActive">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('hsnmasters.index') }}" class="btn btn-secondary">Back to List</a>
</form>
    </div>
@endsection
