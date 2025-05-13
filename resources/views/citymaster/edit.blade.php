@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>Edit City</h2>

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
    <form method="POST" action="{{ route('citymaster.update', $city->ID) }}">
        @csrf
        @method('PUT')

        {{-- City Name Field --}}
        <div class="mb-3">
            <label for="CityName" class="form-label">City Name</label>
            <input type="text" class="form-control" name="CityName" id="CityName" value="{{ old('CityName', $city->CityName) }}" required>
        </div>

        {{-- State Dropdown --}}
        <div class="mb-3">
            <label for="StateID" class="form-label">State</label>
            <select class="form-control" name="StateID" id="StateID" required>
                <option value="">-- Select State --</option>
                @foreach($states as $state)
                    <option value="{{ $state->ID }}" {{ old('StateID', $city->district->StateID ?? '') == $state->ID ? 'selected' : '' }}>
                        {{ $state->StateName }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- District Dropdown --}}
        <div class="mb-3">
            <label for="DistrictID" class="form-label">District</label>
            <select class="form-control" name="DistrictID" id="DistrictID" required>
                <option value="">-- Select District --</option>
                @if($city->district)
                    <option value="{{ $city->district->ID }}" selected>
                        {{ $city->district->DistrictName }}
                    </option>
                @endif
            </select>
        </div>

        {{-- Is Active Checkbox --}}
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="IsActive" id="IsActive" {{ old('IsActive', $city->IsActive) ? 'checked' : '' }}>
            <label class="form-check-label" for="IsActive">Is Active</label>
        </div>

        {{-- Submit and Cancel Buttons --}}
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('citymaster.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        // Safely pass selected district ID into JavaScript
        var selectedDistrictID = "{{ $city->DistrictID ?? '' }}";

        // Fetch districts when the state is selected
        $('#StateID').on('change', function() {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    url: "{{ url('get-districts') }}/" + stateID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#DistrictID').empty(); // Clear previous options
                        $('#DistrictID').append('<option value="">-- Select District --</option>');
                        $.each(data, function(key, value) {
                            var selected = value.ID == selectedDistrictID ? 'selected' : '';
                            $('#DistrictID').append('<option value="' + value.ID + '" ' + selected + '>' + value.DistrictName + '</option>');
                        });
                    },
                    error: function() {
                        alert('Failed to fetch districts. Please try again.');
                    }
                });
            } else {
                $('#DistrictID').empty();
                $('#DistrictID').append('<option value="">-- Select District --</option>');
            }
        });

        // Trigger change event to load districts for the selected state
        $('#StateID').trigger('change');
    });
</script>
@endsection
@endsection
