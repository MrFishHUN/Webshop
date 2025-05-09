<?php

namespace App\Models;

use App\CartStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

    protected $casts = [
        'status' => CartStatus::class,
    ];

    public function isOpen(): bool
    {
        return in_array($this->status, [CartStatus::EMPTY, CartStatus::LOADED]);
    }

    public function addItem($product, int $quantity = 1)
    {
        CartItem::create([
            'product_id' => $product->id,
            'cart_id' => $this->id,
            'quantity' => $quantity,
        ]);
    }
    public function close()
    {
        $this->status = CartStatus::CLOSE;
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function totalPrice()
    {
        return $this->items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    }
}
