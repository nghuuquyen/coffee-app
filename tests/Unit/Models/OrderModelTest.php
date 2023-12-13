<?php

namespace Tests\Unit\Models;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_able_to_get_cart()
    {
        $order = Order::factory()->create();

        $this->assertInstanceOf(Cart::class, $order->cart);
    }

    public function test_able_to_get_signed_path_to_order_detail_page()
    {
        $this->withoutExceptionHandling();
        
        $order = Order::factory()->create();

        $path = $order->getCheckoutConfirmtionPath();
        
        $this->get($path)->assertOk();
    }
}
