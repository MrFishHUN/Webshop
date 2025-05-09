<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input("search");
        $min_price = $request->input("min_price");
        $max_price = $request->input("max_price");
        $categoriesArray = $request->input("categories");

        $query = Product::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where("title", "LIKE", "%{$search}%")
                ->orWhere("description", "LIKE", "%{$search}%")
                ->orWhere("summary", "LIKE", "%{$search}%")
                ->orWhere("slug", "LIKE", "%{$search}%");
            });
        }

        if ($min_price !== null) {
            $query->where("price", ">=", $min_price);
        }

        if ($max_price !== null) {
            $query->where("price", "<=", $max_price);
        }

        if (!empty($categoriesArray) && is_array($categoriesArray)) {
            $query->whereIn("category_id", $categoriesArray);
        }

        $products = $query->paginate(16)->appends($request->query());

        $categories = DB::table('main_categories')->get();
        $alt_categories = DB::table('alt_categories')->get();

        return view('products.index', [
            'products' => $products,
            'main_categories' => $categories,
            'alt_categories' => $alt_categories
        ]);
    }
}
