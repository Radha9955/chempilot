@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Edit HSN Master</h1>

        <form action="{{ route('hsnmasters.update', $hsnMaster->ID) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- HSN Name field -->
            <div class="mb-3">
                <label for="HSNName" class="form-label">HSN Name</label>
                <input type="text" class="form-control" id="HSNName" name="HSNName" value="{{ old('HSNName', $hsnMaster->HSNName) }}" required>
            </div>

            <!-- GST dropdown -->
            <div class="mb-3">
                <label for="GSTID" class="form-label">GST Name</label>
                <select name="GSTID" id="GSTID" class="form-control" required>
                    <option value="">-- Select GST --</option>
                    @foreach($gstData as $gst)
                        <option value="{{ $gst->ID }}" {{ old('GSTID', $hsnMaster->GSTID) == $gst->ID ? 'selected' : '' }}>
                            {{ $gst->GSTName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Is Active checkbox -->
            <div class="mb-3">
                <label for="IsActive" class="form-label">Is Active</label>
                <input type="checkbox" id="IsActive" name="IsActive" value="1" {{ old('IsActive', $hsnMaster->IsActive) ? 'checked' : '' }}>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
