<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    public function all()
    {
        return Book::with(['author','category'])->get();
    }

    public function find($id)
    {
        return Book::findOrFail($id);
    }

    public function create(array $data)
    {
        return Book::create($data);
    }

    public function update(Book $book, array $data)
    {
        return $book->update($data);
    }

    public function delete(Book $book)
    {
        return $book->delete();
    }

    public function search($query)
    {
        return Book::where('name', 'like',"%{$query}%")
            ->orWhereHas('author',fn($q)=>$q->where('name', 'like',"%{$query}%"))
            ->orWhereHas('category',fn($q)=>$q->where('name', 'like', "%{$query}%"))
            ->with(['author','category'])
            ->get();
    }
}
