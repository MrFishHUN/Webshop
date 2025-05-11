<?php

namespace App\Models;

use App\Roles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use Notifiable;
    use SoftDeletes;


    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = ['password'];


    public function carts()
    {
        return $this->hasMany(Cart::class)->whereIn('status', ['empty', 'loaded']);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function hasRole(Roles $role): bool
    {
        return $this->roles()->where('role', $role)->exists();
    }

    public function totalCartPrice(): int
    {
        return $this->carts->sum(fn($cart) => $cart->totalPrice());
    }

}
