<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    /** @use HasFactory<\Database\Factories\OrderInfoFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'postal_code',
        'city',
        'phone',
        'email',
        'billing_name',
        'billing_address',
        'billing_postal_code',
        'billing_phone',
        'billing_email',
        'payment_method',
        'payment_status',
        'payment_transaction_id',
    ];
}
