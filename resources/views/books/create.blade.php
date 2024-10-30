{{-- resources/views/books/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Add New Book')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Add New Book</h2>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Author</label>
                <select name="author_id" class="form-select" required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="publication_year" class="form-label">Publication Year</label>
                <input type="number" name="publication_year" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
