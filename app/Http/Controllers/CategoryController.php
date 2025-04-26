<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get view table data
        $main_categories = DB::table('main_categories')->get();
        $alt_categories = DB::table('alt_categories')->get();

        return view('admin.products.categories.index', ['main_categories' => $main_categories, 'alt_categories' => $alt_categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        $category = new Category([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);
        if (isset($validated['parent_id']) && Category::where('id', $validated['parent_id'])->exists()) {
            $category->parent_id = $validated['parent_id'];
        }
        $category->save();
        return redirect()->route('categories.index') ->with('success', 'Kategória sikeresen létrehozva');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.products.categories.edit', ['category' => $category, 'main_categories' => Category::where('parent_id', null)->get(),'selected' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category = Category::findOrFail($category->id);
        $category->name = $validated['name'];
        $category->description = $validated['description'];
        if (isset($validated['parent_id']) && Category::where('id', $validated['parent_id'])->exists()) {
            $category->parent_id = $validated['parent_id'];
        } else {
            $category->parent_id = null;
        }
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Kategória sikeresen frissítve');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $findCategory = Category::findOrFail($category->id);
        $findCategory->delete();

        return redirect()->route('categories.index')->with('success', 'Kategória sikeresen törölve');
    }

    public function search(Request $request)
    {
        $main_categories = DB::table('main_categories')->where('name','LIKE','%'.$request->name.'%')->get();
        $alt_categories = DB::table('alt_categories')->where('name','LIKE','%'.$request->name.'%')->get();
        return view('admin.products.categories.index', ['main_categories' => $main_categories, 'alt_categories' => $alt_categories]);
    }
}
