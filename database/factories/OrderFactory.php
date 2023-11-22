<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cart_id' => Cart::factory(),
            'code' => fake()->numerify('OR-#########'),
            'full_name' => fake()->name(),
            'phone_number' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'shipping_address' => fake()->streetAddress() . ', ' . fake()->city(),
            'notes' => fake()->paragraph(1),
        ];
    }
}
