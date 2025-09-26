<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My App')</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


</head>
{{-- <div
    x-data="{ show: {{ session('success') || session('error') ? 'true' : 'false' }} }"
    x-show="show"
    x-transition
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
    style="display: none;"
>
  <div
    x-data="{ show: {{ session('success') || session('error') ? 'true' : 'false' }} }"
    x-init="if(show){ setTimeout(() => show = false, 4000) }"
    x-show="show"
    x-transition
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50"
    style="display: none;"
>
    <div
        class="bg-white rounded-xl shadow-2xl p-6 w-96 text-center animate-fade-in-down"
        :class="{
            'border-l-4 border-green-500': '{{ session('success') }}',
            'border-l-4 border-red-500': '{{ session('error') }}'
        }"
    >
        <div class="flex items-center justify-center mb-3">
            @if(session('success'))
                <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            @else
                <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            @endif
        </div>

        <h2 class="text-xl font-semibold mb-2
            {{ session('success') ? 'text-green-600' : 'text-red-600' }}">
            {{ session('success') ? 'Success!' : 'Error!' }}
        </h2>

        <p class="text-gray-600 mb-5">
            {{ session('success') ?? session('error') }}
        </p>

        <button
            @click="show = false"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition"
        >
            OK
        </button>
    </div>
</div>

    </div>
</div> --}}

<body class="min-h-screen bg-gray-100 text-gray-900 flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold tracking-wide">
            <i class="fa-solid fa-book"></i> Book Management System
        </h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="px-4 py-2 rounded-lg bg-gray-400 text-black
                       hover:bg-gray-200 transition">
                Logout
            </button>
        </form>
    </nav>

    <!-- Main content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white text-center py-4 text-gray-500 text-sm border-t">
        &copy; {{ date('Y') }} My App. All rights reserved.
    </footer>

</body>
</html>
