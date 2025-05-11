<?php

namespace App\Models;

use App\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    protected $fillable = [
        'user_id',
        'cart_id',
        'status',
        'ordered_at',
        'order_info_id',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
