{{-- resources/views/authors/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Add New Author')

@section('content')
    <h2>Add New Author</h2>
    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" required>
        </div>
        <button type="submit">Save</button>
    </form>
@endsection
