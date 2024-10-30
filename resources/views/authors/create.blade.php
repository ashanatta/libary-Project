{{-- resources/views/authors/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Add New Author')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Add New Author</h2>
        <form action="{{ route('authors.store') }}" method="POST" class="w-50">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary mt-3">Back to Authors List</a>

    </div>
@endsection
