<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Medicine Database</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-green-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-green-600 text-white px-6 py-4 shadow-md">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold">💊 Medicine Database</h1>
            <div class="space-x-4">
                <a href="/" class="hover:underline">Home</a>
                <a href="/register" class="hover:underline">Register</a>
            </div>
        </div>
    </nav>

    <!-- Login form -->
    <main class="max-w-md mx-auto mt-16 bg-white p-8 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-green-700 mb-6 text-center">Login to Continue</h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-left text-gray-700 font-medium">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-green-400" required>
            </div>

            <div>
                <label class="block text-left text-gray-700 font-medium">Password</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-green-400" required>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg shadow hover:bg-green-700 transition">
                Login
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-4">
            Don’t have an account? 
            <a href="/register" class="text-green-600 hover:underline font-medium">Register here</a>
        </p>
    </main>

</body>
</html>
