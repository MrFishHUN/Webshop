<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Review;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create();
        Category::factory(10)->create();
        Product::factory(100)->create();
        Review::factory(10)->create();
        Discount::factory(50)->create();
        Coupon::factory(50)->create();
        Cart::factory(50)->create();
        CartItem::factory(50)->create();
        Role::factory()->create([
            'user_id' => 1,
            'role' => 'admin',
        ]);
        for ($index = 2; $index <= 100; $index++) {
            Role::factory()->create([
                'user_id' => $index,
                'role' => 'user',
            ]);
        }
    }
}
