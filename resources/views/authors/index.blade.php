{{-- resources/views/authors/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Authors')

@section('content')
    <h2>Authors List</h2>
    <a href="{{ route('authors.create') }}">Add New Author</a>
    <table>
        <thead>
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
                        <a href="{{ route('authors.show', $author->id) }}">View</a> |
                        <a href="{{ route('authors.edit', $author->id) }}">Edit</a> |
                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
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
