@extends('layouts.app')

@section('title', isset($book) ? 'Edit Book' : 'Create Book')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-6">
        {{ isset($book) ? 'Edit Book' : 'Create New Book' }}
    </h2>

    <form
        action="{{ isset($book) ? route('books.update', $book->id) : route('books.store') }}"
        method="POST"
        class="space-y-6"
    >
        @csrf
        @if(isset($book))
            @method('PUT')
        @endif

        <!-- Book Name -->
        <div>
            <label class="block text-gray-700 font-medium">Book Name</label>
            <input type="text"
                   name="name"
                   value="{{ old('name', $book->name ?? '') }}"
                   class="w-full mt-1 border rounded-lg p-2 focus:ring focus:ring-blue-300"
                   required>
        </div>

        <!-- Category Dropdown -->
        <div>
            <label class="block text-gray-700 font-medium">Category</label>
            <select name="category_id"
                    class="w-full mt-1 border rounded-lg p-2 select-search">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $book->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Author Dropdown -->
        <div>
            <label class="block text-gray-700 font-medium">Author</label>
            <select name="author_id"
                    class="w-full mt-1 border rounded-lg p-2 select-search">
                <option value="">-- Select Author --</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}"
                        {{ old('author_id', $book->author_id ?? '') == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Published Date -->
        <div>
            <label class="block text-gray-700 font-medium">Published Date</label>
            <input type="date"
                   name="published_at"
                   value="{{ old('published_at', $book->published_at ?? '') }}"
                   class="w-full mt-1 border rounded-lg p-2 focus:ring focus:ring-blue-300">
        </div>

        <!-- Description -->
        <div>
            <label class="block text-gray-700 font-medium">Description</label>
            <textarea name="description"
                      rows="4"
                      class="w-full mt-1 border rounded-lg p-2 focus:ring focus:ring-blue-300">{{ old('description', $book->description ?? '') }}</textarea>
        </div>

        <!-- Submit -->
        <div class="flex justify-end space-x-4">
            <a href="{{ route('dashboard') }}"
               class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
                Cancel
            </a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                {{ isset($book) ? 'Update Book' : 'Create Book' }}
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css">
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new TomSelect('.select-search');
        });
    </script>
@endsection
