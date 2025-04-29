<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    /** @use HasFactory<\Database\Factories\CouponFactory> */
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'code',
        'percentage',
        'starts_at',
        'ends_at',
    ];

    public function isValid(): bool
    {
        $now = now();
        return $this->starts_at <= $now && $this->ends_at >= $now;
    }
}
