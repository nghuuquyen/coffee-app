<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_able_to_get_cart_items()
    {
        $cart = Cart::factory()
            ->has(CartItem::factory()->count(3), 'items')
            ->create();

        $this->assertTrue(count($cart->items) == 3);

        $this->assertInstanceOf(CartItem::class, $cart->items->random());
    }

    public function test_able_to_get_cart_order()
    {
        $cart = Cart::factory()
            ->has(Order::factory())
            ->has(CartItem::factory()->count(3), 'items')
            ->create();

        $this->assertInstanceOf(Order::class, $cart->order);
    }

    public function test_able_to_get_cart_currency_attribute()
    {
        $cart = Cart::factory()->create();

        $this->assertSame($cart->currency, Product::DEFAULT_CURRENCY);
    }

    public function test_able_to_get_cart_total_amount_attribute()
    {
        $cart = Cart::factory()
            ->has(CartItem::factory()->count(3), 'items')
            ->create();

        $expected_total_amount = $cart->items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $this->assertSame($expected_total_amount, $cart->total_amount);
    }

    public function test_able_to_get_cart_formatted_total_amount_attribute()
    {
        $cart = Cart::factory()
            ->has(CartItem::factory()->count(3), 'items')
            ->create();

        $expected_formatted_total_amount = number_format($cart->total_amount) . ' ' . $cart->currency;

        $this->assertSame($expected_formatted_total_amount, $cart->formatted_total_amount);
    }
}
