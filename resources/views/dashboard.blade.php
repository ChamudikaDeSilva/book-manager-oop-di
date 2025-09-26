@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="w-full max-w-4xl mx-auto p-8 bg-white rounded-xl shadow-lg">
    <h2 class="text-3xl font-extrabold mb-4 text-center tracking-wide py-2">
        Welcome, {{ Auth::user()->name }} 👋
    </h2>
    <p class="text-gray-600 mb-8 text-center leading-relaxed">
        You’re now logged in to your dashboard. Explore your books, manage records, or add new data 🚀
    </p>

    <!-- Example Dashboard Actions -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
        <a href="{{ route('books.index') }}"
           class="p-6 rounded-lg bg-gray-50 border hover:shadow-md transition transform hover:scale-[1.02]">
            <h3 class="text-xl font-semibold mb-2">📚 Books</h3>
            <p class="text-sm text-gray-600">View and manage your book collection.</p>
        </a>

        <a href="{{ route('books.create') }}"
           class="p-6 rounded-lg bg-gray-50 border hover:shadow-md transition transform hover:scale-[1.02]">
            <h3 class="text-xl font-semibold mb-2">➕ Add New</h3>
            <p class="text-sm text-gray-600">Create a new record instantly.</p>
        </a>
    </div>

    <!-- Settings Main Card -->
    <div class="mt-8 p-6 rounded-lg bg-gray-100 border shadow-md">
        <h3 class="text-2xl font-bold mb-4 text-gray-800">⚙️ Settings</h3>
        <p class="text-sm text-gray-600 mb-6">Manage your preferences and customize your dashboard experience.</p>

        <!-- Inner Settings Options -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <a href="#"
               class="p-4 bg-white rounded-lg border hover:shadow-md transition transform hover:scale-[1.02]">
                <h4 class="text-lg font-semibold mb-1">👤 Profile</h4>
                <p class="text-xs text-gray-500">Update your personal details</p>
            </a>

            <a href="#"
               class="p-4 bg-white rounded-lg border hover:shadow-md transition transform hover:scale-[1.02]">
                <h4 class="text-lg font-semibold mb-1">🔒 Security</h4>
                <p class="text-xs text-gray-500">Change password & 2FA</p>
            </a>

            <a href="#"
               class="p-4 bg-white rounded-lg border hover:shadow-md transition transform hover:scale-[1.02]">
                <h4 class="text-lg font-semibold mb-1">🎨 Appearance</h4>
                <p class="text-xs text-gray-500">Theme & layout settings</p>
            </a>
        </div>
    </div>
</div>
@endsection
