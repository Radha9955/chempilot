@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>SubGroup Details</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $subGroup->ID }}</td>
        </tr>
        <tr>
            <th>SubGroup Name</th>
            <td>{{ $subGroup->SubGroupName }}</td>
        </tr>
        <tr>
            <th>Group ID</th>
            <td>{{ $subGroup->GroupID }}</td>
        </tr>
        <tr>
            <th>Discount Percentage</th>
            <td>{{ $subGroup->DiscountPct }}</td>
        </tr>
        <tr>
            <th>Tax Percentage</th>
            <td>{{ $subGroup->TaxPct }}</td>
        </tr>
        <tr>
            <th>Is Active</th>
            <td>{{ $subGroup->IsActive ? 'Yes' : 'No' }}</td>
        </tr>
    </table>
    <a href="{{ route('subgroupmaster.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
