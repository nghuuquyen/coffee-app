<div x-transition:enter="transition fade-in duration-300" x-transition:leave="transition fade-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-[100%]" x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-[100%]" x-cloak
     x-data class="bg-surface py-4 mt-6 fixed bottom-0 left-0 right-0 px-2 lg:px-0" x-show="$wire.display">
    <div class="max-w-screen-xl px-2 py-2 lg:px-12 m-auto flex flex-col lg:flex-row lg:items-center">
        <div class="grow flex">
            <x-icons.cart-bag />

            <ul class="flex flex-wrap ml-2">
                @foreach ($cart->items as $item)
                    <li class="flex flex-row border rounded-lg px-2 py-1 mr-2 mt-2 cursor-pointer text-on-surface-600 hover:bg-primary-400 hover:text-on-primary-100"
                        @click="$dispatch('USER_SELECT_PRODUCT_EVENT', { product_id: {{ $item->product_id }} })">
                        <span class="mr-2y">{{ $item->quantity }}x {{ $item->product->name }}</span>

                        <button
                            class="cursor-pointer hover:text-red-600 active:translate-y-1 hover:rotate-90 ease-in duration-300"
                            wire:click.stop="removeCartItem({{ $item->product_id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <x-button class="mt-3 lg:mt-0" wire:click="checkout" icon="credit-card">
            {{ __('Checkout') }} {{ $cart->formatted_total_amount }}
        </x-button>
    </div>
</div>
