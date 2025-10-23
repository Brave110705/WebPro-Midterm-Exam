<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Medicine | Medicine Database</title>
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

    <!-- form bwt edit -->
    <div class="max-w-3xl mx-auto mt-10 bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4 text-green-700">Edit Medicine</h1>

        <form action="{{ route('medicines.update', $medicine->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold mb-1">Medicine Name</label>
                <input type="text" name="name" value="{{ $medicine->name }}" class="border rounded px-3 py-2 w-full" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Price</label>
                <input type="number" step="0.01" name="price" value="{{ $medicine->price }}" class="border rounded px-3 py-2 w-full" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Stock</label>
                <input type="number" name="stock" value="{{ $medicine->stock }}" class="border rounded px-3 py-2 w-full" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Category</label>
                <select name="category_id" class="border rounded px-3 py-2 w-full">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ $medicine->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('medicines.index') }}" class="text-gray-600 hover:underline">Back</a>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</body>
</html>
