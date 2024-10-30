<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {

        $books = Book::with('author')->get();
        return view('welcome', compact('books'));
    }
}
