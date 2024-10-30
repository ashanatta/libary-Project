{{-- resources/views/books/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <h2>Books List</h2>
    <a href="{{ route('books.create') }}">Add New Book</a>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Publication Year</th>
                <th>Availability</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->publication_year ?? 'N/A' }}</td>
                    <td>{{ $book->is_available ? 'Available' : 'Currently Rented' }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}">View</a> |
                        <a href="{{ route('books.edit', $book->id) }}">Edit</a> |
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
