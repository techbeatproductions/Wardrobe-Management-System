<?php

namespace App\Http\Controllers;

use App\Models\Clothe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

class ClotheController extends Controller
{
    /**
     * Display a listing of the clothing items with filters.
     */
    public function index(Request $request)
    {
        $userId = Auth::id();
        
        Log::info('Filters Received:', $request->all()); // Debug log

        $query = Clothe::where('user_id', $userId);

        if ($request->filled('category')) {
            Log::info('Filtering by category:', ['category' => $request->category]); // Debug
            $query->where('category', $request->category);
        }

        if ($request->filled('color')) {
            $query->where('color', $request->color);
        }

        if ($request->filled('size')) {
            $query->where('size', $request->size);
        }

        if ($request->filled('season')) {
            $query->where('season', $request->season);
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
            });
        }

        // Debugging: Log the actual SQL query with bindings
        Log::info('Final Query:', [
            'query' => $query->toSql(),
            'bindings' => $query->getBindings()
        ]);

        $clothes = $query->paginate(10)->withQueryString();

        // Fetch distinct values in a single query
        $distinctValues = Clothe::where('user_id', $userId)->get(['category', 'color', 'size', 'season', 'brand']);

        return Inertia::render('Clothes/Index', [
            'clothes' => $clothes,
            'filters' => $request->only(['search', 'category', 'color', 'size', 'season', 'brand']),
            'categories' => $distinctValues->pluck('category')->unique()->values(),
            'colors' => $distinctValues->pluck('color')->unique()->values(),
            'sizes' => $distinctValues->pluck('size')->unique()->values(),
            'seasons' => $distinctValues->pluck('season')->unique()->values(),
            'brands' => $distinctValues->pluck('brand')->unique()->values(),
        ]);
    }

    /**
     * Show the form for creating a new clothing item.
     */
    public function create()
    {
        return Inertia::render('Clothes/Create');
    }

    /**
     * Store a newly created clothing item.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'season' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string|url',
        ]);

        $validatedData['user_id'] = Auth::id();

        Clothe::create($validatedData);

        return redirect()->route('clothes.index')->with('success', 'Clothing item created successfully.');
    }

    /**
     * Display the specified clothing item.
     */
    public function show($id)
    {
        $clothe = Clothe::where('user_id', Auth::id())->findOrFail($id);

        return Inertia::render('Clothes/Show', ['clothe' => $clothe]);
    }

    /**
     * Show the form for editing the specified clothing item.
     */
    public function edit($id)
    {
        $clothe = Clothe::where('user_id', Auth::id())->findOrFail($id);

        return Inertia::render('Clothes/Edit', ['clothe' => $clothe]);
    }

    /**
     * Update the specified clothing item.
     */
    public function update(Request $request, $id)
    {
        $clothe = Clothe::where('user_id', Auth::id())->findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:255',
            'color' => 'sometimes|string|max:255',
            'size' => 'sometimes|string|max:255',
            'season' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string|url',
        ]);

        $clothe->update($validatedData);

        return redirect()->route('clothes.index')->with('success', 'Clothing item updated successfully.');
    }

    /**
     * Remove the specified clothing item from the database.
     */
    public function destroy($id)
    {
        $clothe = Clothe::where('user_id', Auth::id())->findOrFail($id);
        $clothe->delete();

        return redirect()->route('clothes.index')->with('success', 'Clothing item deleted successfully.');
    }
}
