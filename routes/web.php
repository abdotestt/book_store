<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class,'index'])->name('home.index');
    Route::resource('books', BookController::class);
   
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/cart', function () {
        return view('shop');
    });});
    Route::post('/books/search', [HelperController::class, 'search'])->name('books.search');

    // Route for the filter function (assuming you have a separate form for filtering)
    Route::post('/books/filter', [HelperController::class, 'filter'])->name('books.filter');
require __DIR__.'/auth.php';
