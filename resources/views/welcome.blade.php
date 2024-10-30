@extends('layouts.app')

@section('title')

@section('content')

    <div class="banner text-white text-center py-5"
        style="background-image: url('images/Baner.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <h1>Welcome to Our Library </h1>
            <p>Find your favorite books and authors here.</p>
        </div>
    </div>

    <div class="container mt-5">
        @if ($books->isEmpty())
            <p>No books available.</p>
        @else
            <div class="row">
                @foreach ($books as $book)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center text-bg-light p-3">
                                    {{ $book->title }}</h5>
                                <img src="images/book.jpg" class="img-fluid" style="max-width: 100%; height: auto;">
                                <p class="card-text"><strong>Author:</strong>
                                    {{ $book->author ? $book->author->name : 'N/A' }}</p>
                                <p class="card-text"><strong>Publication Year:</strong>
                                    {{ $book->publication_year ?? 'N/A' }}</p>
                                <p class="card-text"><strong>Status:</strong>
                                    <span class="badge {{ $book->is_available ? 'bg-success' : 'bg-danger' }}">
                                        {{ $book->is_available ? 'Available' : 'Currently Rented' }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
