<?php

namespace App\Http\Controllers;

use App\CartStatus;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderInfo;
use App\Http\Requests\StoreOrderRequest;
use App\OrderStatus;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $cart = Auth::user()->carts()->first();
        $cart->status = CartStatus::CLOSE;
        $cart->save();

        $order_info = OrderInfo::create([
            'user_id' => $request->user()->id,
            'name' => $request->input('name'),
            'address' => $request->input('street'),
            'postal_code' => $request->input('postcode'),
            'city' => $request->input('city'),
            'phone' => $request->input('phone'),
            'email' => $request->user()->email,
            'billing_name' => $request->input('name'),
            'billing_address' => $request->input('street'),
            'billing_postal_code' => $request->input('postcode'),
            'billing_phone' => $request->input('phone'),
            'billing_email' => $request->user()->email,
            'payment_method' => $request->input('payment'),
            'payment_status' => 'unpaid',
            'payment_transaction_id' => null,
        ]);

        $order = new Order();
        $order->user_id = $request->user()->id;
        $order->status = OrderStatus::PROCESSING;
        $order->cart_id = $cart->id;
        $order->ordered_at = now();
        $order->order_info_id = $order_info->id;
        $order->save();

        $newCart = new Cart();
        $newCart->user_id = $request->user()->id;
        $newCart->status = CartStatus::EMPTY;
        $newCart->save();

        return redirect()->route('home')->with('success', 'Rendelés sikeresen létrehozva és új kosár hozva létre!');
    }
}
