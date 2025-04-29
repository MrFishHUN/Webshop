<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 100),
            'status' => fake()->randomElement(['empty', 'loaded', 'checked_out']),
            'created_at' => fake()->dateTimeThisYear,
            'updated_at' => fake()->dateTimeThisYear,
        ];
    }
}
