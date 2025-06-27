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
        return response()->json(["data" => Item::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('items', 'public');
        }

        $item = Item::create($validated);

        return response()->json($item, 201);
    }

    public function show(Item $item)
    {
        return response()->json($item);
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $validated['image'] = $request->file('image')->store('items', 'public');
        }

        $item->update($validated);

        return response()->json($item);
    }

    public function destroy(Item $item)
    {
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();

        return response()->json(['message' => 'Item deleted']);
    }
}
