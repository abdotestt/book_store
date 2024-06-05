<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HelperController extends Controller
{
    // Search for books by title or author
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for books whose title or author matches the query
        $books = Book::where('title', 'LIKE', "%$query%")
                     ->orWhere('author', 'LIKE', "%$query%")
                     ->get();

        // Return the view with the search results
        return view('books.index', compact('books'));
    }

    // Filter books by category or genre
    public function filter(Request $request)
    {
        $category = $request->input('category');
        $genre = $request->input('genre');

        $books = Book::when($category, function ($query, $category) {
                        return $query->where('category', $category);
                    })
                    ->when($genre, function ($query, $genre) {
                        return $query->where('genre', $genre);
                    })
                    ->get();

        return view('books.index', compact('books'));
    }
}
