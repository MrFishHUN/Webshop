<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use PhpParser\Node\Expr\FuncCall;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['category', 'discount'])->paginate(10);
        return view('admin.products.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.products.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        $slug = $validated['title'];
        $slug = str_replace(' ', '-', $slug);
        $product = new Product([
            'title' => $validated['title'],
            'slug' => $slug,
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
            'picture' => $validated['picture'],
            'summary' => $validated['summary'],
            'quantity' => $validated['quantity'],
            'in_stock' => isset($validated['in_stock']),
            'visible' => isset($validated['visible']),
        ]);
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('products', 'public');
            $product->picture = $path;
        }
        $product->save();
        return redirect()->route('products.index')->with('success', 'Termék sikeresen létrehozva');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.products.edit', ['product' => $product, 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();
        $slug = $validated['title'];
        $slug = str_replace(' ', '-', $slug);
        $product->title = $validated['title'];
        $product->slug = $slug;
        $product->description = $validated['description'];
        $product->summary = $validated['summary'];
        $product->price = $validated['price'];
        $product->category_id = $validated['category_id'];
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('products', 'public');
            $product->picture = $path;
        }
        $product->quantity = $validated['quantity'];
        $product->in_stock = isset($validated['in_stock']);
        $product->visible = isset($validated['visible']);
        $product->save();
        return redirect()->route('products.index')->with('success', 'Termék sikeresen frissítve');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->discount()->delete();
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Termék sikeresen törölve');
    }

    public function search()
    {
        $request = request('search');
        $products = Product::where('title', 'like', '%' . $request . '%')
            ->orWhereHas('category', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request . '%');
            })
            ->paginate(10);
        return view('admin.products.products.index', ['products' => $products])->with('success', 'Keresés sikeres');
    }

    public function display($slug){
        $product = Product::where("slug", $slug)->firstOrFail();
        return view("products.show",["product"=>$product]);
    }

    public function getAllProducts()
    {
        $products = Product::all();
        return response()->json($products);
    }
}
