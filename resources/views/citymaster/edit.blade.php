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
          <label for="DistrictID" class="mt-2">District</label><span class="text-danger">*</span>
<select id="DistrictID" name="DistrictID" class="form-control" required>
    <option disabled selected>-- Select District --</option>
    @if(isset($districts))
        @foreach($districts as $district)
            <option value="{{ $district->ID }}" {{ old('DistrictID', $city->DistrictID ?? '') == $district->ID ? 'selected' : '' }}>
                {{ $district->DistrictName }}
            </option>
        @endforeach
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#StateID').change(function() {
            let stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    url: '/get-districts/' + stateID,
                    type: 'GET',
                    success: function(data) {
                        let districtSelect = $('#DistrictID');
                        districtSelect.empty();
                        districtSelect.append('<option disabled selected>-- Select District --</option>');
                        $.each(data, function(key, district) {
                            districtSelect.append('<option value="' + district.ID + '">' + district.DistrictName + '</option>');
                        });
                    },
                    error: function() {
                        alert('Unable to load districts.');
                    }
                });
            }
        });
    });
</script>

@endsection
@endsection
