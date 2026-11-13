<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // ============================================================
    // INDEX — List with Search, Filter, Sort, Pagination
    // ============================================================
    public function index(Request $request)
    {
        // Start query with category relationship
        $query = Product::with('category');

        // ---------- H1: SEARCH by product name ----------
        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        // ---------- H3: FILTER by Category ----------
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // ---------- H4: FILTER by Availability (boolean) ----------
        // Careful: value "0" is falsy, so use !== '' check
        if ($request->has('available') && $request->available !== '') {
            $query->where('available', $request->available);
        }

        // ---------- I1-I3: SORTING with Allowed List ----------
        $sortBy = $request->query('sort_by', 'name');
        $allowedSorts = ['name', 'price', 'quantity', 'created_at'];

        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'name'; // default fallback
        }
        $query->orderBy($sortBy);

        // ---------- G1: PAGINATION (10 per page = 3 pages for 20+ records) ----------
        // ⚠️ STEP 1: FIRST use this WITHOUT withQueryString() — take Screenshot 12
        // $products = $query->paginate(10);

        // ⚠️ STEP 2: THEN add ->withQueryString() — take Screenshot 13
        $products = $query->paginate(10)->withQueryString();

        return view('products.index', compact('products'));
    }

    // ============================================================
    // SHOW — Detail Page
    // ============================================================
    public function show(Product $product)
    {
        $product->load('category');
        return view('products.show', compact('product'));
    }

    // ============================================================
    // CREATE — Show form
    // ============================================================
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // ============================================================
    // STORE — Save new record
    // ============================================================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'available'   => 'nullable|boolean',
            'description' => 'nullable|string',
        ]);

        $validated['available'] = $request->has('available') ? true : false;

        Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product added successfully!');
    }

    // ============================================================
    // EDIT — Show edit form
    // ============================================================
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // ============================================================
    // UPDATE — Save changes
    // ============================================================
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'available'   => 'nullable|boolean',
            'description' => 'nullable|string',
        ]);

        $validated['available'] = $request->has('available') ? true : false;

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully!');
    }

    // ============================================================
    // DESTROY — Delete record
    // ============================================================
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully!');
    }
}
