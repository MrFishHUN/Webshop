<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisplayProductsController extends Controller
{
    public function index()
    {
        $discountedProducts = DB::table('discounted_products')->inRandomOrder()->limit(8)->get();

        return view('home', [
            'discountedProducts' => $discountedProducts,
        ]);
    }
}
