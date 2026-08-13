<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class MenuItemController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');

        $items = MenuItem::with('category')
            ->when($q, function ($query) use ($q) {
                $query->where('name', 'like', '%'.$q.'%')
                    ->orWhere('description', 'like', '%'.$q.'%');
            })
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();
        $categories = Category::orderBy('name')->get();
        $editing = null;

        if ($request->query('edit')) {
            $editing = MenuItem::with('category')->find($request->query('edit'));
        }

        return view('admin.menu.index', compact('items', 'categories', 'editing', 'q'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:20|max:1000',
            'price' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_available' => 'nullable|boolean',
        ]);

        $data['is_available'] = $request->boolean('is_available');
        $data['image'] = $request->file('image')->store('menu', 'public');
        $data['image_url'] = null;

        MenuItem::create($data);

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit(MenuItem $menuItem)
    {
        $items = MenuItem::with('category')->orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('admin.menu.index', [
            'items' => $items,
            'categories' => $categories,
            'editing' => $menuItem,
        ]);
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $imageRule = $menuItem->image ? 'nullable' : 'required';

        $data = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:20|max:1000',
            'price' => 'required|integer|min:0',
            'image' => $imageRule.'|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_available' => 'nullable|boolean',
        ]);

        $data['is_available'] = $request->boolean('is_available');

        if ($request->hasFile('image')) {
            if ($menuItem->image) {
                Storage::disk('public')->delete($menuItem->image);
            }
            $data['image'] = $request->file('image')->store('menu', 'public');
            $data['image_url'] = null;
        }

        $menuItem->update($data);

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(MenuItem $menuItem)
    {
        if ($menuItem->image) {
            Storage::disk('public')->delete($menuItem->image);
        }

        $menuItem->delete();

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil dihapus.');
    }

    public function availableIds()
    {
        return response()->json(
            MenuItem::where('is_available', true)->pluck('id')->map(fn ($id) => (string) $id)
        );
    }

    public function show(MenuItem $menuItem)
    {
        return view('menu.show', compact('menuItem'));
    }

    public function availability()
    {
        $items = MenuItem::orderBy('name')->get();

        return view('admin.menu.availability', compact('items'));
    }

    public function toggleAvailability(MenuItem $menuItem, Request $request)
    {
        $menuItem->update([
            'is_available' => ! $menuItem->is_available,
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $menuItem->is_available
                    ? '"'.$menuItem->name.'" kini tersedia.'
                    : '"'.$menuItem->name.'" ditandai habis.',
                'is_available' => $menuItem->is_available,
            ]);
        }

        return redirect()->route('admin.menu.index')->with('success',
            $menuItem->is_available
                ? '"'.$menuItem->name.'" kini tersedia.'
                : '"'.$menuItem->name.'" ditandai habis.'
        );
    }
}
