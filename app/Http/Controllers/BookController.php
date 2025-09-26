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

    // public function store(BookRequest $request)
    // {
    //     $book=Book::create($request->validated());

    //     return redirect()->route('books.edit', $book->id)
    //         ->with('success','Book created successfully.');

    // }

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
            //dd($request->all());
            $book->update($request->validated());

            return redirect()->route('books.edit', $book->id)
                            ->with('success', 'Book updated successfully.');
        } catch (\Exception $e) {
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
}
