<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word,
            'slug' => fake()->unique()->slug,
            'description' => fake()->sentence,
            'price' => fake()->randomFloat(2, 1, 1000),
            'category_id' => fake()->numberBetween(1, 10),
            'picture' => fake()->imageUrl(640, 480),
            'summary' => fake()->sentence,
            'quantity' => fake()->numberBetween(1, 100),
        ];
    }
}
