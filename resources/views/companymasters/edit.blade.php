@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2 class="text-primary">Edit Company</h2>

        <form action="{{ route('companymasters.update', $company->ID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-md-6">
                    <label>Company Name <span class="text-danger">*</span></label>
                    <input type="text" name="CompanyName" class="form-control"
                        value="{{ old('CompanyName', $company->CompanyName) }}">
                    @error('CompanyName') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6">
                    <label>Mobile Phone <span class="text-danger">*</span></label>
                    <input type="text" name="MobilePhone" class="form-control"
                        value="{{ old('MobilePhone', $company->MobilePhone) }}">
                    @error('MobilePhone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mt-3">
                    <label>TIN <span class="text-danger">*</span></label>
                    <input type="text" name="TIN" class="form-control" value="{{ old('TIN', $company->TIN) }}">
                    @error('TIN') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mt-3">
                    <label>Phone</label>
                    <input type="text" name="Phone" class="form-control" value="{{ old('Phone', $company->Phone) }}">
                </div>

                <div class="col-md-6 mt-3">
                    <label>GST <span class="text-danger">*</span></label>
                    <input type="text" name="GST" class="form-control" value="{{ old('GST', $company->GST) }}">
                    @error('GST') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mt-3">
                    <label>WhatsApp No</label>
                    <input type="text" name="WhatsAppNo" class="form-control"
                        value="{{ old('WhatsAppNo', $company->WhatsAppNo) }}">
                </div>

                <div class="col-md-6 mt-3">
                    <label>Company Code</label>
                    <input type="text" name="CompanyCode" class="form-control"
                        value="{{ old('CompanyCode', $company->CompanyCode) }}">
                </div>

                <div class="col-md-6 mt-3">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="Email" class="form-control" value="{{ old('Email', $company->Email) }}">
                    @error('Email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mt-3">
                    <label>Address Line1 <span class="text-danger">*</span></label>
                    <input type="text" name="AddressLine1" class="form-control"
                        value="{{ old('AddressLine1', $company->AddressLine1) }}">
                    @error('AddressLine1') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mt-3">
                    <label>Website</label>
                    <input type="text" name="Website" class="form-control" value="{{ old('Website', $company->Website) }}">
                </div>

                <div class="col-md-6 mt-3">
                    <label>Address Line2</label>
                    <input type="text" name="AddressLine2" class="form-control"
                        value="{{ old('AddressLine2', $company->AddressLine2) }}">
                </div>

                <div class="col-md-6 mt-3">
                    <label>Address Line3</label>
                    <input type="text" name="AddressLine3" class="form-control"
                        value="{{ old('AddressLine3', $company->AddressLine3) }}">
                </div>

                <div class="col-md-6 mt-3">
                    <label>Logo</label>
                    <input type="file" name="Logo" class="form-control">
                    @if($company->Logo)
                        <div class="mt-2">
                            <img src="{{ asset('logos/' . $company->Logo) }}" alt="Company Logo" style="max-height: 100px;">
                        </div>
                    @endif
                </div>

                <div class="col-md-6 mt-3">
                    <label>City <span class="text-danger">*</span></label>
                    <select name="CityID" class="form-control">
                        <option value="">--Select City--</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->ID }}" {{ old('CityID', $company->CityID) == $city->ID ? 'selected' : '' }}>
                                {{ $city->CityName }}
                            </option>
                        @endforeach
                    </select>
                    @error('CityID') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mt-3">
                    <label>Pin Code <span class="text-danger">*</span></label>
                    <input type="text" name="PinCode" class="form-control" value="{{ old('PinCode', $company->PinCode) }}">
                    @error('PinCode') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mt-3">
                    <div class="form-check">
                        <input type="checkbox" name="IsActive" class="form-check-input" id="isActive" 
                            {{ old('IsActive', $company->IsActive) ? 'checked' : '' }}>
                        <label class="form-check-label" for="isActive">Is Active</label>
                    </div>
                </div>

                <div class="col-md-12 mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('companymasters.index') }}" class="btn btn-secondary">Back To List</a>
                </div>
            </div>
        </form>
    </div>
@endsection