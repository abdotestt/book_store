<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
    
        // Recherchez les livres dont le titre ou l'auteur correspond à la requête
        $books = Book::where('title', 'LIKE', "%$query%")
                     ->orWhere('author', 'LIKE', "%$query%")
                     ->get();
    
        // Retournez la vue avec les résultats de la recherche
        return view('books.index', compact('books'));
    }

    // Filtrer les livres par catégorie ou genre
    public function filter(Request $request)
    {
        $category = $request->input('category');
        $genre = $request->input('genre');

        $books = Book::when($category, function($query, $category) {
                        return $query->where('category', $category);
                    })
                    ->when($genre, function($query, $genre) {
                        return $query->where('genre', $genre);
                    })
                    ->get();
        return view('books.index', compact('books'));
    }
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'cover' => 'nullable|string|max:255',
        ]);

        Book::create($validatedData);

        return redirect()->route('index')->with('success', 'Book created successfully.');
    }

  
    public function show( $id)
    {
        $book = Book::findOrFail($id);
        return view('books.details', compact('book'));
    }

 
    public function edit(Book $book)
    {
        return view('edit', compact('book'));
    }

   
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'cover' => 'nullable|string|max:255',
        ]);

        $book->update($validatedData);

        return redirect()->route('index')->with('success', 'Book updated successfully.');
    }

    
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('index')->with('success', 'Book deleted successfully.');
    }
}