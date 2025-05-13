@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>Add New City</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('citymaster.store') }}">
        @csrf

        <div class="mb-3">
            <label for="CityName" class="form-label">City Name</label>
            <input type="text" class="form-control" name="CityName" id="CityName" value="{{ old('CityName') }}" required>
        </div>

        <div class="mb-3">
            <label for="StateID" class="form-label">State</label>
            <select class="form-control" name="StateID" id="StateID" required>
                <option value="">-- Select State --</option>
                @foreach($states as $state)
                    <option value="{{ $state->ID }}">{{ $state->StateName }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="DistrictID" class="form-label">District</label>
            <select class="form-control" name="DistrictID" id="DistrictID" required>
                <option value="">-- Select District --</option>
            </select>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="IsActive" id="IsActive" {{ old('IsActive') ? 'checked' : '' }}>
            <label class="form-check-label" for="IsActive">Is Active</label>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('citymaster.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@section('scripts')
<script>
    $('#StateID').on('change', function() {
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                url: "{{ url('get-districts') }}/" + stateID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#DistrictID').empty();
                    $('#DistrictID').append('<option value="">-- Select District --</option>');
                    $.each(data, function(key, value) {
                        $('#DistrictID').append('<option value="'+ value.ID +'">'+ value.DistrictName +'</option>');
                    });
                }
            });
        } else {
            $('#DistrictID').empty();
            $('#DistrictID').append('<option value="">-- Select District --</option>');
        }
    });
</script>
@endsection
@endsection
