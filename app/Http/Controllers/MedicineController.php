<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Category;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index(Request $request)
    {
    $query = Medicine::with('category');


    $sort_by = $request->get('sort_by', 'name'); // default sort
    $sort_order = $request->get('sort_order', 'asc'); // default order

    if (in_array($sort_by, ['name', 'price', 'stock'])) {
        $query->orderBy($sort_by, $sort_order);
    }

    if ($request->has('search') && !empty($request->search)) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $medicines = $query->get();
    $categories = Category::all();

    return view('medicines.index', compact('medicines', 'categories', 'sort_by', 'sort_order'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'stock' => 'required|integer|min:0'
        ]);

        Medicine::create($validated);
        return redirect()->route('medicines.index')->with('success', 'Medicine added successfully!');
    }

    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();
        return redirect()->route('medicines.index')->with('success', 'Medicine deleted successfully!');
    }

    public function increaseStock($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->stock += 1;
        $medicine->save();

        return redirect()->back()->with('success', 'Stock increased!');
    }

    public function decreaseStock($id)
    {
        $medicine = Medicine::findOrFail($id);
        if ($medicine->stock > 0) {
            $medicine->stock -= 1;
            $medicine->save();
        }

        return redirect()->back()->with('success', 'Stock decreased!');
    }

    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        $categories = Category::all();
        return view('medicines.edit', compact('medicine', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        $medicine = Medicine::findOrFail($id);
        $medicine->update($validated);

        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully!');
    }
}

