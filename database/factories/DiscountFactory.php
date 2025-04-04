<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           "product_id" => fake()->unique()->numberBetween(1, 100),
           "percentage" => fake()->numberBetween(5,20),
           "starts_at" => fake()->dateTimeThisYear,
            "ends_at" => fake()->dateTimeThisYear,
        ];
    }
}
