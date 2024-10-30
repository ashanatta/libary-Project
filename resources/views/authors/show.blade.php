{{-- resources/views/authors/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Author Details')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">{{ $author->name }}</h2>

        <h3 class="mb-3">Books by this Author</h3>

        @if ($author->books->isEmpty())
            <p class="text-muted">No books available for this author.</p>
        @else
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Publication Year</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($author->books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->publication_year ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('authors.index') }}" class="btn btn-secondary mt-3">Back to Authors List</a>
    </div>
@endsection
