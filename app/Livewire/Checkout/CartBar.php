<?php

namespace App\Livewire\Checkout;

use App\Models\Cart;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Events\LivewireEvent;
use App\Services\CartService;
use Illuminate\Support\Facades\Log;

class CartBar extends Component
{
    public Cart $cart;

    public $display = false;

    protected $listeners = [
        LivewireEvent::CART_UPDATED_EVENT => 'loadingCartData',
    ];

    public function mount(): void
    {
        $this->loadingCartData();
    }

    public function loadingCartData(): void
    {
        $cart = new CartService();

        $this->cart = $cart->getCart();

        $this->display = $this->cart->items->isNotEmpty();
    }

    public function removeCartItem($product_id): void
    {
        $cart = new CartService();

        $cart->removeCartItem($product_id);

        $this->loadingCartData();

        Log::channel('user_actions')->info('User remove product out of cart', ['product_id' => $product_id]);
    }

    public function checkout()
    {
        return redirect()->route('checkout.index');
    }

    public function render(): View
    {
        return view('livewire.checkout.cart-bar');
    }
}
