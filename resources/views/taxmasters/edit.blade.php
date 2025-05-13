@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Tax Master</h2>

    <form action="{{ route('taxmasters.update', ['taxmaster' => $tax->ID]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="TaxName">Tax Name</label>
            <input type="text" name="TaxName" class="form-control" value="{{ old('TaxName', $tax->TaxName) }}" required>
        </div>

        <div class="form-group">
            <label for="IGST">IGST (%)</label>
            <input type="number" step="0.01" name="IGST" id="IGST" class="form-control" value="{{ old('IGST', $tax->IGST) }}">
        </div>

        <div class="form-group">
            <label for="CGST">CGST (%)</label>
            <input type="number" step="0.01" name="CGST" id="CGST" class="form-control" value="{{ old('CGST', $tax->CGST) }}" readonly>
        </div>
        <div class="form-group">
            <label for="SGST">SGST (%)</label>
            <input type="number" step="0.01" name="SGST" id="SGST" class="form-control" value="{{ old('SGST', $tax->SGST) }}" readonly>
        </div>

        <div class="form-group">
            <label for="CESS">CESS (%)</label>
            <input type="number" step="0.01" name="CESS" class="form-control" value="{{ old('CESS', $tax->CESS) }}">
        </div>

        <div class="form-check">
            <input type="checkbox" name="IsActive" class="form-check-input" value="1" {{ $tax->IsActive ? 'checked' : '' }}>
            <label class="form-check-label" for="IsActive">Active</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('taxmasters.index') }}" class="btn btn-secondary mt-3">Back</a>
    </form>
</div>

<!-- Auto-calculate CGST/SGST from IGST -->
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