<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderInfo>
 */
class OrderInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => fake()->unique()->numberBetween(1, 100),
            'user_id' => fake()->numberBetween(1, 100),
            'name' => fake()->name(),
            'address' => fake()->address(),
            'postal_code' => fake()->postcode(),
            'city' => fake()->city(),
            'country' => fake()->country(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'billing_name' => fake()->name(),
            'billing_address' => fake()->address(),
            'billing_postal_code' => fake()->postcode(),
            'billing_city' => fake()->city(),
            'billing_country' => fake()->country(),
            'billing_phone' => fake()->phoneNumber(),
            'billing_email' => fake()->email(),
            'payment_method' => fake()->randomElement(['credit_card', 'paypal', 'cash']),
            'payment_status' => fake()->randomElement(['pending', 'completed', 'failed']),
            'payment_transaction_id' => fake()->optional()->uuid(),
        ];
    }
}
