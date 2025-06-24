<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use App\Models\Track;
use App\Models\Artist;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   public function index()
{
    // Get all categories
        $categories = Category::withCount('products')->get();

        $productsByCategory = [];
        foreach ($categories as $category) {
            $productsByCategory[$category->id] = [
                'products' => $category->products()->latest()->take(1)->get(),
                'total' => $category->products_count,
            ];
        }
    // Pass the data to the view
    return view('welcome', compact('productsByCategory', 'categories'));
}

    public function create()
    {
        $categories = Category::all();
        return view('services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('services.index')->with('success', 'Product created successfully.');
    }

    public function show(Category $category)
    {
      $tracks = [];
        
        if (strtolower($category->name) === 'music') {
        // Eager load relationships with null checks
       $tracks = Track::with(['album.artist'])->latest()->paginate(5); // 38 items per page
        
        // Get the first artist once to avoid multiple queries
        $defaultArtist = Artist::first();
        //dd($defaultArtist);
        // Add artist relationship to each track
        $tracks->each(function ($track) use ($defaultArtist) {
        $track->artist = $track->album?->artist ?? $defaultArtist;
        });
        }
        //dd($tracks);
        return view('services.show', compact('category','tracks'));
    }
// ProductController.php
    public function showAll(Category $category)
    {
    $products = $category->products()->latest()->get();
    return view('products.show_all', compact('category', 'products'));
    }
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('services.index')->with('success', 'Product deleted successfully.');
    }
}