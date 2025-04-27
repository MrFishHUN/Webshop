<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DisplayElectronicDevicesController extends Controller
{
    public function index()
    {
        $products = DB::table('main_categories')->inRandomOrder()->limit(8)->get();

        return view('category.electronic-parts.index', [
            'product' => $products,
        ]);
    }
}
