@extends('layouts.app')

@section('title', 'All Rentals')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">All Rentals</h2>
        <a href="{{ route('rentals.create') }}" class="btn btn-primary mb-3">Rent a Book</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Book Title</th>
                    <th>Renter Name</th>
                    <th>Rented At</th>
                    <th>Returned At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                    <tr>
                        <td>{{ $rental->book->title }}</td>
                        <td>{{ $rental->renter_name }}</td>
                        <td>{{ $rental->rented_at }}</td>
                        <td>{{ $rental->returned_at ? $rental->returned_at : 'Not returned' }}</td>
                        <td>
                            @if (!$rental->returned_at)
                                <form action="{{ route('rentals.return', $rental) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm">Return Book</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
