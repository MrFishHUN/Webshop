<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DisplayPartsController extends Controller
{
    public function index()
    {
        $products = DB::table('main_categories')->inRandomOrder()->limit(8)->get();

        return view('category.parts.index', [
            'product' => $products,
        ]);
    }
}
