@extends('layouts.app')

@section('title', 'All Rentals')

@section('content')
    <a href="{{ route('rentals.create') }}">Rent a Book</a>
    <table>
        <thead>
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
                            <form action="{{ route('rentals.return', $rental) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit">Return Book</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
