<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisplayTelevisionController extends Controller
{
    public function index()
    {
        $products = DB::table('main_categories')->inRandomOrder()->limit(8)->get();

        return view('category.televison.index', [
            'product' => $products,
        ]);
    }
}
