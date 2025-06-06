<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => fake()->numberBetween(1, 100),
            'user_id' => fake()->numberBetween(1, 100),
            'rating' => fake()->numberBetween(1, 5),
            'comment' => fake()->sentence,
            'created_at' => fake()->dateTimeThisYear,
        ];
    }
}
