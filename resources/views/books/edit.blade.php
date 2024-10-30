{{-- resources/views/books/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
    <h2>Edit Book</h2>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ $book->title }}" required>
        </div>
        <div>
            <label for="author_id">Author</label>
            <select name="author_id" required>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="publication_year">Publication Year</label>
            <input type="number" name="publication_year" value="{{ $book->publication_year }}">
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
