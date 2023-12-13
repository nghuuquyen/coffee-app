<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Cart;
use App\Models\Order;
use App\Models\CartItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckoutControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_render_checkout_page()
    {
        $this->get(route('checkout.index'))
            ->assertOk();
    }

    public function test_display_correct_cart_data()
    {
        Session::put('user_id', 'DUMMY_USER_ID');

        $cart = Cart::factory()
            ->has(CartItem::factory()->count(3), 'items')
            ->create();

        $response = $this->withSession(['user_id' => 'DUMMY_USER_ID'])
            ->get(route('checkout.index'));

        foreach ($cart->items as $item) {
            $response
                ->assertSee($item->product->name)
                ->assertSee($item->product->getFormattedTotalAmount(5));
        }
    }

    public function test_got_validation_errors()
    {
        $this->post(route('checkout.store'))
            ->assertInvalid([
                'full_name',
                'phone_number',
                'email',
                'shipping_address',
            ]);
    }

    public function test_can_create_order_when_submit_checkout()
    {
        Session::put('user_id', 'DUMMY_USER_ID');

        $cart = Cart::factory()
            ->has(CartItem::factory()->count(3), 'items')
            ->create();

        $body = [
            'full_name' => 'John',
            'phone_number' => '+84111122222',
            'email' => 'john@example.com',
            'shipping_address' => 'lorem ipsum',
        ];

        $response = $this->withSession(['user_id' => 'DUMMY_USER_ID'])
            ->post(route('checkout.store'), $body);

        $order = Order::query()->where('cart_id', $cart->id)->first();

        $this->assertDatabaseHas('orders', array_merge(['id' => $order->id], $body));

        $response->assertRedirectToSignedRoute('orders.complete', ['order' => $order->id]);
    }
}
