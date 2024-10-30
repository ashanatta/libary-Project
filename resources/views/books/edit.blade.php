{{-- resources/views/books/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Edit Book</h2>
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Author</label>
                <select name="author_id" class="form-select" required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="publication_year" class="form-label">Publication Year</label>
                <input type="number" name="publication_year" class="form-control" value="{{ $book->publication_year }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
