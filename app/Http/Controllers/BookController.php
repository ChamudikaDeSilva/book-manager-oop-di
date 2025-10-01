<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function create()
    {
        $categories = Category::all();

        $authors = Author::all();

        return view('books.form')->with([
            'categories'=>$categories,
            'authors'=>$authors
        ]);
    }

    public function edit(Book $book)
    {
        $categories = Category::all();

        $authors = Author::all();

        return view('books.form')->with([
            'book'=>$book,
            'categories'=>$categories,
            'authors'=>$authors
        ]);
    }

    public function store(BookRequest $request)
    {
        try {
            $book = Book::create($request->validated());

            return redirect()->route('books.edit', $book->id)
                            ->with('success', 'Book created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function update(BookRequest $request, Book $book)
    {


        try {
            $validated = $request->validated();


            $book->update($validated);

            return redirect()->route('books.edit', $book->id)
                            ->with('success', 'Book updated successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage()); // show actual error
            return back()->with('error', 'Update failed. Please try again.');
        }
    }


    public function destroy(Book $book)
    {
        try {
            $book->delete();

            return redirect()->route('dashboard')
                            ->with('success', 'Book deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Delete failed. Please try again.');
        }
    }


    public function booksIndex()
    {
        $books =Book::with(['author','category'])->get();

        return view('books.index')->with([
            'books'=>$books
        ]);
    }

    public function show(Book $book)
    {
        return view('books.view')->with([
            'book'=>$book
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $books = Book::where('title', 'like', "%{$query}%")
                     ->orWhere('isbn', 'like', "%{$query}%")
                     ->orWhereHas('author', function ($q) use ($query) {
                         $q->where('name', 'like', "%{$query}%");
                     })
                     ->orWhereHas('category', function ($q) use ($query) {
                         $q->where('name', 'like', "%{$query}%");
                     })
                     ->with(['author', 'category'])
                     ->get();

        return view('books.index')->with([
            'books' => $books,
            'searchQuery' => $query
        ]);
    }
}
