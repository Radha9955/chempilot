@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Tax Masters</h2>
      <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('taxmasters.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Create New
    </a>
</div>

    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-uppercase text-center">
                <tr>
                    <th>Tax Name</th>
                    <th>CGST (%)</th>
                    <th>SGST (%)</th>
                    <th>IGST (%)</th>
                    <th>CESS (%)</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($taxes as $tax)
                    <tr>
                        <td>{{ $tax->TaxName }}</td>
                        <td class="text-end">{{ number_format($tax->CGST, 2) }}</td>
                        <td class="text-end">{{ number_format($tax->SGST, 2) }}</td>
                        <td class="text-end">{{ number_format($tax->IGST, 2) }}</td>
                        <td class="text-end">{{ number_format($tax->CESS, 2) }}</td>
                        <td class="text-center">
                            @if($tax->IsActive)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('taxmasters.edit', $tax->ID) }}" class="btn btn-sm btn-warning me-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('taxmasters.destroy', $tax->ID) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure you want to delete this tax?')" type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No tax records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
