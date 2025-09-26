@extends('layouts.app')

@section('title', 'View Book')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h1 class="text-2xl font-bold mb-6">Book Details</h1>

    <div class="space-y-4">
        <div>
            <span class="font-semibold text-gray-700">ID:</span>
            <span>{{ $book->id }}</span>
        </div>

        <div>
            <span class="font-semibold text-gray-700">Name:</span>
            <span>{{ $book->name }}</span>
        </div>

        <div>
            <span class="font-semibold text-gray-700">Description:</span>
            <p class="text-gray-600">{{ $book->description }}</p>
        </div>

        <div>
            <span class="font-semibold text-gray-700">Category:</span>
            <span>{{ $book->category->name ?? 'N/A' }}</span>
        </div>

        <div>
            <span class="font-semibold text-gray-700">Author:</span>
            <span>{{ $book->author->name ?? 'N/A' }}</span>
        </div>

        <div>
            <span class="font-semibold text-gray-700">Published Date:</span>
            <span>{{ $book->published_at }}</span>
        </div>
    </div>

    <div class="flex justify-end space-x-3 mt-6">
        {{-- Back button --}}
        <a href="{{ route('books.index') }}"
           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow">
            <i class="fas fa-arrow-left"></i> Back
        </a>

        {{-- Edit button --}}
        <a href="{{ route('books.edit', $book->id) }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow">
            <i class="fas fa-edit"></i> Edit
        </a>

        {{-- Delete button --}}
        <form action="{{ route('books.destroy', $book->id) }}" method="POST"
              onsubmit="return confirm('Are you sure you want to delete this book?');">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow">
                <i class="fas fa-trash"></i> Delete
            </button>
        </form>
    </div>
</div>
@endsection
