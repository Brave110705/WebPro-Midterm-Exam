<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Medicine Database</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-green-600 text-white px-6 py-4 shadow-md">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold">💊 Medicine Database</h1>
            <div class="space-x-4">
                <a href="/" class="hover:underline">Home</a>
                <a href="/login" class="hover:underline">Login</a>
            </div>
        </div>
    </nav>

    <!-- Register form -->
    <main class="max-w-md mx-auto mt-16 bg-white p-8 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-green-700 mb-6 text-center">Create an Account</h2>

        <!-- ✅ Confirmation Messages -->
        @if (session('status'))
            <div class="mb-4 p-3 text-green-800 bg-green-100 border border-green-300 rounded">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-3 text-red-800 bg-red-100 border border-red-300 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- ✅ Laravel route + CSRF protection -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-left text-gray-700 font-medium">Name</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-green-400" required>
            </div>

            <div>
                <label class="block text-left text-gray-700 font-medium">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-green-400" required>
            </div>

            <div>
                <label class="block text-left text-gray-700 font-medium">Password</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-green-400" required>
            </div>

            <div>
                <label class="block text-left text-gray-700 font-medium">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-green-400" required>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg shadow hover:bg-green-700 transition">
                Register
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-4">
            Already have an account? 
            <a href="/login" class="text-green-600 hover:underline font-medium">Login here</a>
        </p>
    </main>

</body>
</html>
