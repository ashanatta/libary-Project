{{-- resources/views/authors/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Author Details')

@section('content')
    <h2>{{ $author->name }}</h2>
    <h3>Books by this Author</h3>
    <
