<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    /** @use HasFactory<\Database\Factories\DiscountFactory> */
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['product_id', 'percentage', 'starts_at', 'ends_at'];
    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];
    protected $primaryKey = 'product_id';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
