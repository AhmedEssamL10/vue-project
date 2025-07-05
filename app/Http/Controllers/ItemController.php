<?php

namespace App\Http\Controllers;

use view;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        return response()->json(["data" => Item::get(), "isSuccess" => true]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'string'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('items', 'public');
        }

        $item = Item::create($validated);

        return response()->json([
            'data' => $item,
            'isSuccess' => true,
            'message' => 'Offer created successfully'
        ], 201);
    }

    public function show(Item $item)
    {
        return response()->json([
            'data' => $item,
            'isSuccess' => true
        ]);
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'string',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // Delete old image
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }

            $validated['image'] = $request->file('image')->store('items', 'public');
        } elseif ($request->filled('image')) {
            // User sent old image path - trust it as is
            $validated['image'] = $request->input('image');
        } else {
            // Neither new file nor existing image path sent - remove image
            $validated['image'] = null;
        }

        $item->update($validated);

        return response()->json([
            'data' => $item,
            'isSuccess' => true,
            'message' => 'Offer updated successfully'
        ]);
    }


    public function destroy(Item $item)
    {
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();

        return response()->json([
            'isSuccess' => true,
            'message' => 'Offer deleted successfully'
        ]);
    }
}
