{{-- resources/views/books/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Add New Book')

@section('content')
    <h2>Add New Book</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label for="author_id">Author</label>
            <select name="author_id" required>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="publication_year">Publication Year</label>
            <input type="number" name="publication_year">
        </div>
        <button type="submit">Save</button>
    </form>
@endsection
