{{-- resources/views/authors/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Author')

@section('content')
    <h2>Edit Author</h2>
    <form action="{{ route('authors.update', $author->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $author->name }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
