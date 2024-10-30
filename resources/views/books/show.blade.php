{{-- resources/views/books/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Book Details')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">{{ $book->title }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Author:</strong> {{ $book->author->name }}</p>
                <p><strong>Publication Year:</strong> {{ $book->publication_year ?? 'N/A' }}</p>
                <p><strong>Status:</strong>
                    <span class="badge {{ $book->is_available ? 'bg-success' : 'bg-danger' }}">
                        {{ $book->is_available ? 'Available' : 'Currently Rented' }}
                    </span>
                </p>
            </div>
        </div>

        <div class="mt-4">
            <h3>Rental History</h3>
            <table class="table table-bordered table-striped mt-2">
                <thead class="table-dark">
                    <tr>
                        <th>Renter Name</th>
                        <th>Rented At</th>
                        <th>Returned At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($book->rentals as $rental)
                        <tr>
                            <td>{{ $rental->renter_name }}</td>
                            <td>{{ $rental->rented_at }}</td>
                            <td>{{ $rental->returned_at ?? 'Not yet returned' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
