<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HelperController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $books = Book::where('title', 'LIKE', "%$query%")
                     ->orWhere('author', 'LIKE', "%$query%")
                     ->get();

        return view('books.index', compact('books'));
    }

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
