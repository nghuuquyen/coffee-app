<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartItemModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_able_to_get_cart()
    {
        $cart_item = CartItem::factory()->create();

        $this->assertInstanceOf(Cart::class, $cart_item->cart);
    }

    public function test_able_to_get_product()
    {
        $cart_item = CartItem::factory()->create();

        $this->assertInstanceOf(Product::class, $cart_item->product);
    }
}
