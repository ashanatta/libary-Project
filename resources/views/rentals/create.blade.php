@extends('layouts.app')

@section('title', 'Rent a Book')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Rent a Book</h2>
        <form action="{{ route('rentals.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="book_id" class="form-label">Select Book</label>
                <select name="book_id" class="form-select" required>
                    @foreach ($availableBooks as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="renter_name" class="form-label">Renter Name</label>
                <input type="text" name="renter_name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Rent Book</button>
        </form>
    </div>
@endsection
