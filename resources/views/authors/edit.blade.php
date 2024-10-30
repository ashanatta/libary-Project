{{-- resources/views/authors/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Author')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Edit Author</h2>
        <form action="{{ route('authors.update', $author->id) }}" method="POST" class="w-50">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" value="{{ $author->name }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary mt-3">Back to Authors List</a>

    </div>
@endsection
