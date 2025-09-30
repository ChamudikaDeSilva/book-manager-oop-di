@extends('layouts.app')

@section('title', 'Books List')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Books</h1>
        <a href="{{ route('books.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow">
            <i class="fas fa-plus"></i> Add Book
        </a>
    </div>

    <table class="table-auto w-full border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="border border-gray-200 px-4 py-2">#</th>
                <th class="border border-gray-200 px-4 py-2">Name</th>
                <th class="border border-gray-200 px-4 py-2">Description</th>
                <th class="border border-gray-200 px-4 py-2">Category</th>
                <th class="border border-gray-200 px-4 py-2">Author</th>
                <th class="border border-gray-200 px-4 py-2">Published Date</th>
                <th class="border border-gray-200 px-4 py-2 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td class="border border-gray-200 px-4 py-2">{{ $book->id }}</td>
                    <td class="border border-gray-200 px-4 py-2">{{ $book->name }}</td>
                    <td class="border border-gray-200 px-4 py-2">{{ $book->description }}</td>
                    <td class="border border-gray-200 px-4 py-2">{{ $book->category->name ?? 'N/A' }}</td>
                    <td class="border border-gray-200 px-4 py-2">{{ $book->author->name ?? 'N/A' }}</td>
                    <td class="border border-gray-200 px-4 py-2">{{ $book->published_at }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-center flex justify-center space-x-3">
                        {{-- View button --}}
                        <a href="{{ route('books.show', $book->id) }}"
                           class="text-green-500 hover:text-green-700"
                           title="View">
                            <i class="fas fa-eye"></i>
                        </a>

                        {{-- Edit button --}}
                        <a href="{{ route('books.edit', $book->id) }}"
                           class="text-blue-500 hover:text-blue-700"
                           title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>

                        {{-- Delete button --}}
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure to delete this book?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
