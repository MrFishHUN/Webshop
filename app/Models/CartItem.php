<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    /** @use HasFactory<\Database\Factories\CartItemFactory> */
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'cart_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
