<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with('book')->get();
        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        // Fetch only available books
        $availableBooks = Book::where('is_available', true)->get();
        return view('rentals.create', compact('availableBooks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'renter_name' => 'required|string|max:255',
        ]);

        // Check if the book is available before renting
        $book = Book::findOrFail($request->book_id);
        if (!$book->is_available) {
            return redirect()->back()->withErrors(['error' => 'This book is currently rented out.']);
        }

        // Create rental record
        $rental = Rental::create([
            'book_id' => $request->book_id,
            'renter_name' => $request->renter_name,
            'rented_at' => now(),
            'returned_at' => null,
        ]);

        // Update book availability
        $book->is_available = false;
        $book->save();

        return redirect()->route('rentals.index')->with('success', 'Book rented successfully');
    }

    public function show($bookId)
    {
        // Display rental history for a specific book
        $book = Book::with('rentals')->findOrFail($bookId);
        return view('books.show', compact('book'));
    }

    public function returnBook(Rental $rental)
    {
        // Ensure rental is not already returned
        if ($rental->returned_at) {
            return redirect()->back()->withErrors(['error' => 'This book has already been returned.']);
        }

        // Update the rental record with the returned_at timestamp
        $rental->returned_at = now();
        $rental->save();

        // Mark the book as available again
        $book = $rental->book;
        $book->is_available = true;
        $book->save();

        return redirect()->route('rentals.index')->with('success', 'Book returned successfully');
    }

    public function destroy(Rental $rental)
    {
        $book = $rental->book;

        // Only set book as available if the rental was active
        if (!$rental->returned_at) {
            $book->is_available = true;
            $book->save();
        }

        $rental->delete();

        return redirect()->route('rentals.index')->with('success', 'Rental record deleted');
    }
}
