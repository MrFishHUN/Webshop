<?php

namespace App\Http\Controllers;

use App\CartStatus;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderInfo;
use App\Models\Product;
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
        $carts = Order::all();
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

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order = Order::with('cart.user', 'cart.items.product')->findOrFail($order->id);

        return view('admin.orders.carts.show', [
            'cart' => $order->cart,
            'order' => $order,
        ]);
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
    public function destroy(Order $cart)
    {
        //
    }
    public function addItem(Request $request){
        if (!Auth::check()) {
            return view('auth.login');
        }
        $user = Auth::user();
        $cart = $user->cart;

        if (!$cart || $cart->status === CartStatus::CLOSE) {
            $cart = Cart::create([
                'user_id' => $user->id,
                'status' => CartStatus::EMPTY,
            ]);
        }

        $cart->addItem(Product::findOrFail($request->input('product_id')));
        return redirect()->back()->with("succes", "Termék sikeresen hozzáadva");
    }
}
