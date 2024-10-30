<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentalController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('rentals', RentalController::class);
Route::patch('rentals/{rental}/return', [RentalController::class, 'returnBook'])->name('rentals.return');
