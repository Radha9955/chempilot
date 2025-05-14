{{-- resources/views/productmaster/edit.blade.php --}}
@extends('layouts.layout')

@section('title', 'Edit Product')

@section('content')
    <form method="POST" action="{{ route('productmaster.update', ['productmaster' => $product->ID]) }}" id="editProMas" name="prodmasteraddedit">
        @csrf
        @method('PUT')
        <div class="border p-3 mt-4">
            <h2 class="text-primary">Edit Product Master</h2>
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
                <input name="ProductName" id="ProductName" type="text" class="form-control" value="{{ old('ProductName', $product->ProductName) }}" required />
                @error('ProductName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mb-2">
                            <label for="SubGroupID">Sub Group</label><label class="text-danger star h5">*</label>
                            <select id="SubGroupID" name="SubGroupID" class="form-control" required>
                                <option disabled>--Select SubGroup--</option>
                                @foreach($subgroups as $subgroup)
                                    <option value="{{ $subgroup->ID }}" {{ old('SubGroupID', $product->SubGroupID) == $subgroup->ID ? 'selected' : '' }}>
                                        {{ $subgroup->SubGroupName }}
                                    </option>
                                @endforeach
                            </select>
                            @error('SubGroupID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br />

                            <label for="GroupName">Group</label>
                            <input id="GroupName" name="GroupName" type="text" class="form-control" value="{{ old('GroupName', $product->GroupName) }}" readonly />
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" name="IsActive" id="IsActive" class="form-check-input" value="1" {{ old('IsActive', $product->IsActive) ? 'checked' : '' }}>
                <label for="IsActive" class="form-check-label">Is Active</label>
            </div>

            <input type="hidden" name="UpdatedBy" value="{{ Auth::id() }}">

            <div class="mb-3">
                <label for="ModifiedDate" class="form-label">Modified Date</label>
                <input type="datetime-local" name="ModifiedDate" id="ModifiedDate" class="form-control"
                    value="{{ old('ModifiedDate', \Carbon\Carbon::parse($product->ModifiedDate)->format('Y-m-d\TH:i')) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
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
        function fetchGroupName(subgroupId) {
            if (!subgroupId) return;

            $.ajax({
                url: "/subgroup/get-group",
                type: "GET",
                data: { subgroup_id: subgroupId },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data && data.group_name !== undefined) {
                        $("#GroupName").val(data.group_name);
                    } else {
                        $("#GroupName").val(''); // fallback if no group found
                        console.warn("Group name not found.");
                    }
                },
                error: function (error) {
                    console.error('Error fetching Group data: ', error);
                }
            });
        }

        // On change of SubGroup
        $("#SubGroupID").change(function () {
            var selectedSubGroupId = $(this).val();
            fetchGroupName(selectedSubGroupId);
        });

        // 👇 Fetch GroupName on page load
        var initialSubGroupId = $("#SubGroupID").val();
        if (initialSubGroupId) {
            fetchGroupName(initialSubGroupId);
        }
    });
</script>

    <script src="{{ asset('resources/js/productmaster.js') }}"></script>
@endsection
