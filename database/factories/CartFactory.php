<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Services\UserService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cart>
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
            'user_id' => UserService::getUserIdFromSession(),
        ];
    }
}
