<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //descending order by created_at and where status is checked_out
        $carts = Cart::where('status', '=', 'checked_out')->orderBy('created_at', 'desc')->with(['user'])->paginate(10);
        return view('admin.orders.carts.index', ['carts' => $carts]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        $cart = Cart::with(['user', 'items.product'])->find($cart->id);
        return view('admin.orders.carts.show', ['cart' => $cart]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
    public function addItem(Request $request){
        if (!Auth::check()) {
            return view('auth.login');
        }
        $user = Auth::user();
        $user->cart->addItem($request->input('product_id'));
        return redirect()->back()->with("succes", "Termék sikeresen hozzáadva");
    }
}
