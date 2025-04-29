<?php

namespace App\Models;

use App\Roles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id',
        'role',
    ];

    protected $casts = [
        'role' => Roles::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
