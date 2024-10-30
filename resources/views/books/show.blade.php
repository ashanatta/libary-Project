{{-- resources/views/books/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Book Details')

@section('content')
    <h2>{{ $book->title }}</h2>
    <p><strong>Author:</strong> {{ $book->author->name }}</p>
    <p><strong>Publication Year:</strong> {{ $book->publication_year ?? 'N/A' }}</p>
    <p><strong>Status:</strong> {{ $book->is_available ? 'Available' : 'Currently Rented' }}</p>

    <h3>Rental History</h3>
    <table>
        <thead>
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
@endsection
