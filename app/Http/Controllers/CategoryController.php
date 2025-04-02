<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Mockery\Exception;

class CategoryController extends Controller
{
    //TODO: Change test view to admin view if everything works

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('test.category.index', ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('test.category.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        try {
            Category::create($validated);

            return redirect()->route('categories.index', ['categories' => Category::all(), 'success' => 'Category created successfully']);
            //TODO: Redirect admin page with success message
        }
        catch (Exception $e) {
            return redirect()->route('categories.index', ['categories' => Category::all()])->withErrors(['error' => 'Category creation failed']);
            //TODO: Redirect admin page with error message
        }
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
        return view('test.category.edit', ['category' => $category, 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try{
            $validated = $request->validated();
            $findCategoty = Category::findOrFail($category->id);
            $findCategoty->update($validated);

            return redirect()->route('categories.index', ['categories' => Category::all(), 'success' => 'Category updated successfully']);
            //TODO: Redirect admin page with success message
        }
        catch (Exception $e){
            return redirect()->back()->withErrors(['error' => 'Category update failed']);
            //TODO: Redirect admin page with error message
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $findCategory = Category::findOrFail($category->id);
        $findCategory->delete();
        return redirect()->route('categories.index', ['categories' => Category::all(), 'success' => 'Category deleted successfully']);
    }
}
