@extends('layouts.app')

@section('title', 'Rent a Book')

@section('content')
    <form action="{{ route('rentals.store') }}" method="POST">
        @csrf
        <div>
            <label for="book_id">Select Book</label>
            <select name="book_id" required>
                @foreach ($availableBooks as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="renter_name">Renter Name</label>
            <input type="text" name="renter_name" required>
        </div>
        <button type="submit">Rent Book</button>
    </form>
@endsection
