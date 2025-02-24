<?php

namespace App\Http\Controllers;

use App\Models\Clothe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ClotheController extends Controller
{
    /**
     * Display a listing of the clothing items.
     *
     * @param Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Start with the base query for the authenticated user
        $query = Clothe::where('user_id', $userId);

        // Apply filters if provided in the request
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }
        if ($request->has('color')) {
            $query->where('color', $request->color);
        }
        if ($request->has('size')) {
            $query->where('size', $request->size);
        }
        if ($request->has('season')) {
            $query->where('season', $request->season);
        }
        if ($request->has('brand')) {
            $query->where('brand', $request->brand);
        }

        // Search by name or description (optional)
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Paginate the results (optional)
        $clothes = $query->paginate(10);

        // Render the Inertia view with the clothes data
        return Inertia::render('Clothes/Index', [
            'clothes' => $clothes,
            'filters' => $request->only(['search', 'category', 'color', 'size', 'season', 'brand']),
        ]);
    }

    /**
     * Show the form for creating a new clothing item.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Clothes/Create');
    }

    /**
     * Store a newly created clothing item in the database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'season' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string',
        ]);

        // Add the authenticated user's ID to the data
        $validatedData['user_id'] = Auth::id();

        // Create the clothing item
        Clothe::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('clothes.index')->with('success', 'Clothing item created successfully.');
    }

    /**
     * Display the specified clothing item.
     *
     * @param int $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        // Find the clothing item by ID and ensure it belongs to the authenticated user
        $clothe = Clothe::where('user_id', Auth::id())->findOrFail($id);

        // Render the Inertia view with the clothing item data
        return Inertia::render('Clothes/Show', [
            'clothe' => $clothe,
        ]);
    }

    /**
     * Show the form for editing the specified clothing item.
     *
     * @param int $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        // Find the clothing item by ID and ensure it belongs to the authenticated user
        $clothe = Clothe::where('user_id', Auth::id())->findOrFail($id);

        // Render the Inertia view with the clothing item data
        return Inertia::render('Clothes/Edit', [
            'clothe' => $clothe,
        ]);
    }

    /**
     * Update the specified clothing item in the database.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Find the clothing item by ID and ensure it belongs to the authenticated user
        $clothe = Clothe::where('user_id', Auth::id())->findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:255',
            'color' => 'sometimes|string|max:255',
            'size' => 'sometimes|string|max:255',
            'season' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string',
        ]);

        // Update the clothing item
        $clothe->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('clothes.index')->with('success', 'Clothing item updated successfully.');
    }

    /**
     * Remove the specified clothing item from the database.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the clothing item by ID and ensure it belongs to the authenticated user
        $clothe = Clothe::where('user_id', Auth::id())->findOrFail($id);

        // Delete the clothing item
        $clothe->delete();

        // Redirect to the index page with a success message
        return redirect()->route('clothes.index')->with('success', 'Clothing item deleted successfully.');
    }
}