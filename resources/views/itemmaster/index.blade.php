@extends('layouts.layout')

@section('title', 'Item Master')

@section('content')
    <h2>Item List</h2>

    {{-- Flash messages --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Create button --}}
    <a href="{{ route('itemmaster.create') }}" class="btn btn-success mb-3">Create New Item</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Product ID</th>
                <th>Price Range</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->ID }}</td>
                    <td>{{ $item->ItemName }}</td>
                    <td>{{ $item->ProductID }}</td>
                    <td>{{ $item->FromPrice }} - {{ $item->ToPrice }}</td>
                    <td>
                          <a href="{{ route('itemmaster.show', $item->ID) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('itemmaster.edit', $item->ID) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('itemmaster.destroy', $item->ID) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $items->links('pagination::bootstrap-4') }}
    </div>

    {{-- Confirmation Script --}}
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this item? It might be linked to other records.');
        }
    </script>
@endsection
