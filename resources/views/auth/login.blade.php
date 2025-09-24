<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite('resources/css/app.css') <!-- Tailwind -->
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-900 via-purple-900 to-gray-900">

    <div class="w-full max-w-lg p-12 rounded-2xl shadow-2xl backdrop-blur-xl bg-white/10 border border-white/20 animate-fadeIn min-h-[600px] flex flex-col justify-center">
        <h2 class="text-3xl font-extrabold mb-6 text-center text-white tracking-wide">
            Welcome Back 👋
        </h2>

        @if ($errors->any())
            <div class="bg-red-500/20 text-red-300 p-3 rounded-lg mb-4 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <!-- Email -->
            <div>
                <label class="block mb-1 text-sm font-medium text-white/80">Email</label>
                <input type="email" name="email"
                       class="w-full px-4 py-2 rounded-lg bg-white/20 border border-white/30
                              placeholder-gray-200 text-white focus:outline-none focus:ring-2
                              focus:ring-purple-400 focus:border-transparent transition"
                       placeholder="you@example.com" required>
            </div>
            <!-- Password -->
            <div>
                <label class="block mb-1 text-sm font-medium text-white/80">Password</label>
                <input type="password" name="password"
                       class="w-full px-4 py-2 rounded-lg bg-white/20 border border-white/30
                              placeholder-gray-200 text-white focus:outline-none focus:ring-2
                              focus:ring-purple-400 focus:border-transparent transition"
                       placeholder="••••••••" required>
            </div>
            <!-- Button -->
            <button type="submit"
                    class="w-full py-2 rounded-lg bg-gradient-to-r from-purple-600 to-blue-600
                           text-white font-semibold tracking-wide shadow-lg hover:scale-[1.02]
                           hover:shadow-purple-500/50 transition transform duration-200">
                Login
            </button>
        </form>

        <!-- Extra -->
        {{-- <p class="mt-6 text-center text-sm text-white/70">
            Don’t have an account?
            <a href="#" class="text-purple-300 hover:underline">Register</a>
        </p> --}}
    </div>

    <!-- Tailwind Animations -->
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out;
        }
    </style>
</body>
</html>
