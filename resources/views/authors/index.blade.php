{{-- resources/views/authors/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Authors')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Authors List</h2>
        <a href="{{ route('authors.create') }}" class="btn btn-success mb-3">Add New Author</a>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>
                            <a href="{{ route('authors.show', $author->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
