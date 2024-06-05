<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
       
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {  
        $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'description' => 'required|string',
        'genre' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'cover' => 'nullable|string|max:255',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
                         ->withErrors($validator)
                         ->withInput();
    }

    $book = new Book;
    $book->title = $request->input('title');
    $book->author = $request->input('author');
    $book->description = $request->input('description');
    $book->genre = $request->input('genre');
    $book->category = $request->input('category');
    $book->cover = $request->input('cover');
    $book->save();

    return redirect()->route('index')->with('success', 'Book created successfully.');
    }

  
    public function show( $id)
    {
        $book = Book::findOrFail($id);
        return view('books.details', compact('book'));
    }

 
    public function edit( $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

   
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'cover' => 'nullable|string|max:255',
        ]);

        $book = Book::findOrFail($id);
        $book->update($validatedData);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    
    public function destroy( $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}