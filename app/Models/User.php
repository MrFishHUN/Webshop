<?php

namespace App\Models;

use App\Roles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class User extends Model
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

    public function sendPasswordReset()
    {
        // Logic to send password reset email
        $token = bin2hex(random_bytes(32));

        DB::table('password_reset_tokens')->updateOrInsert(
            ['user_id' => $this->id],
            [
                'token' => $token,
                'created_at' => now(),
                'expires_at' => now()->addMinutes(15),
            ]
        );

        logger()->info("Password reset token for user {$this->email}: {$token}");
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function hasRole(Roles $role): bool
    {
        return $this->roles()->where('role', $role)->exists();
    }
}
