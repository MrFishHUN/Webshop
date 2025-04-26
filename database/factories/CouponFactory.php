<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->unique()->word,
            'percentage' => fake()->numberBetween(5, 80),
            'starts_at' => fake()->dateTimeThisYear,
            'ends_at' => fake()->dateTimeThisYear,
        ];
    }
}
