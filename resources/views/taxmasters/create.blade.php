@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>Create Tax Master</h2>

    <form action="{{ route('taxmasters.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="TaxName">Tax Name</label>
            <input type="text" name="TaxName" class="form-control" value="{{ old('TaxName') }}" required>
        </div>

        <div class="form-group">
            <label for="IGST">IGST (%)</label>
            <input type="number" step="0.01" name="IGST" id="IGST" class="form-control" value="{{ old('IGST') }}">
        </div>

        <div class="form-group">
            <label for="CGST">CGST (%)</label>
            <input type="number" step="0.01" name="CGST" id="CGST" class="form-control" value="{{ old('CGST') }}" readonly>
        </div>

        <div class="form-group">
            <label for="SGST">SGST (%)</label>
            <input type="number" step="0.01" name="SGST" id="SGST" class="form-control" value="{{ old('SGST') }}" readonly>
        </div>

        <div class="form-group">
            <label for="CESS">CESS (%)</label>
            <input type="number" step="0.01" name="CESS" class="form-control" value="{{ old('CESS') }}">
        </div>

        <div class="form-check">
            <input type="checkbox" name="IsActive" class="form-check-input" value="1" checked>
            <label class="form-check-label" for="IsActive">Active</label>
        </div>

        <button type="submit" class="btn btn-success mt-3">Save</button>
        <a href="{{ route('taxmasters.index') }}" class="btn btn-secondary mt-3">Back</a>
    </form>
</div>

<!-- JavaScript for auto calculation -->
<script>
    document.getElementById('IGST').addEventListener('input', function () {
        let igst = parseFloat(this.value);
        if (!isNaN(igst)) {
            let half = (igst / 2).toFixed(2);
            document.getElementById('CGST').value = half;
            document.getElementById('SGST').value = half;
        } else {
            document.getElementById('CGST').value = '';
            document.getElementById('SGST').value = '';
        }
    });
</script>
@endsection
