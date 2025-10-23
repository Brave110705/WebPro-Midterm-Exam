<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Medicine List | Medicine Database</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-800">

    <!--  Navbar -->
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

    <div class="mb-6">
        <h2 class="text-lg font-semibold mb-2 text-green-700">Add Category</h2>
        <form action="{{ route('categories.store') }}" method="POST" class="flex gap-2">
            @csrf
            <input type="text" name="name" placeholder="Category Name" class="border rounded px-3 py-2 flex-1" required>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                Add Category
            </button>
        </form>
    </div>

    <!--  di bawah ini buat tabel, dll-->
    <div class="max-w-4xl mx-auto mt-10 bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4 text-green-700">Medicine List</h1>

    <form action="{{ route('medicines.index') }}" method="GET" class="mb-6 flex gap-2">
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}" 
            placeholder="Search medicine by name..." 
            class="border rounded px-3 py-2 w-full"
        >
        <button 
            type="submit" 
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
        >
            Search
        </button>
    </form>

    <!-- Add medicine -->
    <form action="{{ route('medicines.store') }}" method="POST" class="mb-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-3">
            <input type="text" name="name" placeholder="Medicine Name" class="border rounded px-3 py-2" required>
            <input type="number" step="0.01" name="price" placeholder="Price" class="border rounded px-3 py-2" required>
            <input type="number" name="stock" placeholder="Stock" class="border rounded px-3 py-2" required>

            <select name="category_id" class="border rounded px-3 py-2">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
            Add Medicine
        </button>
    </form>

<table class="min-w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
            <th class="border border-gray-300 px-4 py-2 text-left">
                <a href="{{ route('medicines.index', ['sort_by' => 'name', 'sort_order' => ($sort_by == 'name' && $sort_order == 'asc') ? 'desc' : 'asc']) }}">
                    Name
                    @if ($sort_by == 'name')
                        {{ $sort_order == 'asc' ? '▲' : '▼' }}
                    @endif
                </a>
            </th>
            <th class="border border-gray-300 px-4 py-2 text-left">
                <a href="{{ route('medicines.index', ['sort_by' => 'price', 'sort_order' => ($sort_by == 'price' && $sort_order == 'asc') ? 'desc' : 'asc']) }}">
                    Price
                    @if ($sort_by == 'price')
                        {{ $sort_order == 'asc' ? '▲' : '▼' }}
                    @endif
                </a>
            </th>
            <th class="border border-gray-300 px-4 py-2 text-left">
                <a href="{{ route('medicines.index', ['sort_by' => 'stock', 'sort_order' => ($sort_by == 'stock' && $sort_order == 'asc') ? 'desc' : 'asc']) }}">
                    Stock
                    @if ($sort_by == 'stock')
                        {{ $sort_order == 'asc' ? '▲' : '▼' }}
                    @endif
                </a>
            </th>
            <th class="border border-gray-300 px-4 py-2 text-left">Category</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($medicines as $medicine)
            <tr class="hover:bg-gray-50">
                <td class="border border-gray-300 px-4 py-2">{{ $medicine->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $medicine->name }}</td>
                <td class="border border-gray-300 px-4 py-2">Rp{{ number_format($medicine->price, 2) }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $medicine->stock }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    {{ $medicine->category ? $medicine->category->name : 'No Category' }}
                </td>
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <!-- Edit -->
                    <a href="{{ route('medicines.edit', $medicine->id) }}" 
                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded block mb-1 text-center">
                        Edit
                    </a>

                    <!-- Delete -->
                    <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="mb-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded w-full">
                            Delete
                        </button>
                    </form>

                    <!-- Increase / Decrease -->
                    <div class="flex justify-center space-x-2">
                        <form action="{{ route('medicines.increase', $medicine->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">+</button>
                        </form>

                        <form action="{{ route('medicines.decrease', $medicine->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-orange-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">−</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
</body>
</html>
