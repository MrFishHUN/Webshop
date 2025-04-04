<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisplayProductsController extends Controller
{
    public function index()
    {
        $proudcts = DB::table('discounted_products')->inRandomOrder()->limit(6)->get();
        return view('home', ['proudcts'=> $proudcts]);
    }
}
