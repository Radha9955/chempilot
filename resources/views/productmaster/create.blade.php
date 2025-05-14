@extends('layouts.layout')

@section('title', 'Add Product')

@section('content')
    <form method="POST" action="{{ route('productmaster.store') }}" id="newProMas" name="prodmasteraddedit">
        @csrf
        <div class="border p-3 mt-4">
            <h2 class="text-primary">Create Product Master</h2>
            <hr />
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="mb-2">
                <label for="ProductName">Product Name</label><label class="text-danger">*</label>
                <input name="ProductName" id="ProductName" type="text" class="form-control" value="{{ old('ProductName') }}" required />
                @error('ProductName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-2">
                            <label for="SubGroupID">Sub Group</label><label class="text-danger star h5">*</label>
                            <select id="SubGroupID" name="SubGroupID" class="form-control" required>
                                <option disabled selected>--Select SubGroup--</option>
                                @foreach($subgroups as $subgroup)
                                    <option value="{{ $subgroup->ID }}" {{ old('SubGroupID') == $subgroup->ID ? 'selected' : '' }}>
                                        {{ $subgroup->SubGroupName }}
                                    </option>
                                @endforeach
                            </select>
                            @error('SubGroupID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br />
                            <label for="GroupName">Group</label>
                            <input id="GroupName" name="GroupName" type="text" class="form-control" value="{{ old('GroupName') }}" readonly />
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-check mb-3">
                <input type="checkbox" name="IsActive" id="IsActive" class="form-check-input" value="1" {{ old('IsActive') ? 'checked' : '' }}>
                <label for="IsActive" class="form-check-label">Is Active</label>
            </div>
            
            <input type="hidden" name="CreatedBy" value="{{ Auth::id() }}">
            
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('productmaster.index') }}" class="btn btn-secondary"><i class="bi bi-back"></i> Back To List</a>
        </div>
    </form>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/productmaster.js') }}"></script>
    <script>
        $(document).ready(function () {
            // Handle subgroup change to get group information
            $("#SubGroupID").change(function () {
                var selectedSubGroupId = $(this).val(); // Get the selected SubGroup ID
                console.log("Selected SubGroup ID:", selectedSubGroupId); // Debugging log

                $.ajax({
                    url: "/subgroup/get-group", // Use the correct route URL
                    type: "GET",
                    data: { subgroup_id: selectedSubGroupId }, // Pass the selected SubGroup ID
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for security
                    },
                    success: function (data) {
                        console.log("Response Data:", data); // Debugging log
                        // Update the Group input field if the group name is not undefined
                        if (data && data.group_name !== undefined) {
                            $("#GroupName").val(data.group_name); // Set the GroupName field with the returned value
                        } else {
                            console.warn("Group name is undefined in the response.");
                        }
                    },
                    error: function (error) {
                        console.error('Error fetching Group data: ', error);
                    }
                });
            });
        });
    </script>
    <script src="{{ asset('resources/js/productmaster.js') }}"></script>
@endsection
