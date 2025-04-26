<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'description', 'price', 'category_id', 'picture', 'summary', 'quantity', 'in_stock', 'visible'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function discount()
    {
        return $this->hasOne(Discount::class);
    }
}
