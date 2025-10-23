<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Database</title>
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
                <a href="/medicines" class="hover:underline">Database</a>
                @auth
                    <span class="font-semibold">{{ Auth::user()->name }}</span>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="max-w-3xl mx-auto mt-10 text-center">
        <h2 class="text-3xl font-bold mb-4">Welcome to the Medicine Database</h2>

        @auth
            <p class="text-lg text-gray-700 mb-6">
                ✅ You are logged in as <strong>{{ Auth::user()->name }}</strong>!  
                You can now modify the database.
            </p>
        @else
            <p class="text-lg text-red-600 mb-6 font-semibold">
                ⚠️ You are not logged in! You won’t be able to modify the database.
            </p>
        @endauth

        <p class="text-lg text-gray-600 mb-6">
            masi gtw mw ditaruh ap
        </p>

        <a href="/medicines" class="bg-green-600 text-white px-5 py-3 rounded-lg shadow hover:bg-green-700 transition">
            Go to Database
        </a>
    </main>

    <!-- Logout button (bwh kanan) -->
    @auth
        <form method="POST" action="{{ route('logout') }}" class="fixed bottom-1 right-0">
            @csrf
            <button type="submit" 
                class="text-red-600 hover:text-red-800 font-semibold underline transition">
                Log out
            </button>
        </form>
    @endauth

</body>
</html>
