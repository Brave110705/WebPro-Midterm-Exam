<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Medicine Database</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-green-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-green-600 text-white px-6 py-4 shadow-md">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold">💊 Medicine Database</h1>
            <div class="space-x-4">
                <a href="/home" class="hover:underline">Home</a>
                <a href="/login" class="hover:underline">Login</a>
            </div>
        </div>
    </nav>

    <!-- Register form -->
    <main class="max-w-md mx-auto mt-16 bg-white p-8 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-green-700 mb-6 text-center">Create an Account</h2>

        <form action="#" method="POST" class="space-y-4">
            <div>
                <label class="block text-left text-gray-700 font-medium">Name</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-green-400" required>
            </div>

            <div>
                <label class="block text-left text-gray-700 font-medium">Password</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-green-400" required>
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
