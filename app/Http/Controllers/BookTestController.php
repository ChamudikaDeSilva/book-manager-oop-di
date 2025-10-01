<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookTestController extends Controller
{
    protected BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        return view('dahsboard');
    }

    public function booksIndex()
    {
        $books = $this->bookService->getAllBooks();

        return view('books.index')->with(['books'=>$books]);
    }

    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();

        return view('books.form')->with([
            'categories' =>$categories,
            'authors' =>$authors
        ]);
    }

    public function store(BookRequest $request)
    {
        $book = $this->bookService->createBook($request->validated());
        return redirect()->route('books.edit',$book->id)->with('success','Book created successfully');
    }

    public function edit (Book $book)
    {
        $categories = Category::all();
        $authors = Author::all();

        return view('books.form')->with([
            'book'=>$book,
            'categories' =>$categories,
            'authors' =>$authors
        ]);
    }

    public function update(BookRequest $request, Book $book)
    {
        $this->bookService->updateBook($book,$request->validated());
        return redirect()->route('books.edit',$book->id)->with('success','Book updated successfully');
    }

    public function destroy(Book $book)
    {
        $this->bookService->deleteBook($book);
        return redirect()->route('books.index')->with('success','Book deleted successfully');
    }

    public function search(Request $request)
    {
        $query= $request->input('query');
        $books = $this->bookService->searchBooks($query);
        return view('books.index')->with(['books'=>$books,'query'=>$query]);
    }


}
