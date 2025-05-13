@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Edit GST Master</h1>
        <form action="{{ route('gstmasters.update', $gstMaster->ID) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="GSTName">GST Name:</label>
                <input type="text" name="GSTName" id="GSTName" class="form-control" value="{{ $gstMaster->GSTName }}" required>
            </div>
            <div class="form-group">
                <label for="FromAmount">From Amount:</label>
                <input type="text" name="FromAmount" id="FromAmount" class="form-control" value="{{ $gstMaster->FromAmount }}">
            </div>
            <div class="form-group">
                <label for="ToAmount">To Amount:</label>
                <input type="text" name="ToAmount" id="ToAmount" class="form-control" value="{{ $gstMaster->ToAmount }}">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('gstmasters.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
