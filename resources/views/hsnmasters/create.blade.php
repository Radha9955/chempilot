@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Create New HSN Master</h1>

        <form action="{{ route('hsnmasters.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="HSNName" class="form-label">HSN Name</label>
                <input type="text" class="form-control" id="HSNName" name="HSNName" required>
            </div>

            <div class="mb-3">
                <label for="GSTID" class="form-label">GST Name</label>
                <select name="GSTID" id="GSTID" class="form-control" required>
                    <option value="">-- Select GST --</option>
                    @foreach($gstData as $gst)
                        <option value="{{ $gst->ID }}">
                            {{ $gst->GSTName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="IsActive" class="form-label">Is Active</label>
                <input type="checkbox" id="IsActive" name="IsActive" value="1">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
