<x-offcanvas>
    @if (isset($product->id))
        <x-slot:title>
            {{ $product->name }}
        </x-slot:title>

        <x-slot:body>
            <div class="grid gird-cols-1 gap-6">
                <img class="object-cover w-full h-64" src="{{ $product->display_image_url }}?w=600"
                     alt="product image"/>

                <span class="text-on-surface-600 text-3xl font-bold">
                        {{ $product->formatted_price }}
                    </span>

                <p class="overflow-y-auto max-h-32 text-on-surface-500">
                    {{ $product->description }}
                </p>
            </div>

            <div>
                <x-text-input label="{{ __('Special instructions') }}" model="notes"
                              placeholder="{{ __('Ex. No onions please') }}"/>

                <div class="flex flex-row items-center mt-4 text-on-surface-600">
                    <div class="w-1/3 grid grid-cols-3">
                        <button class="active:translate-y-1" wire:click="decrement">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                 class="w-5 h-5">
                                <path fill-rule="evenodd"
                                      d="M3.75 12a.75.75 0 01.75-.75h15a.75.75 0 010 1.5h-15a.75.75 0 01-.75-.75z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <span class="text-3xl font-bold"> {{ $quantity }}</span>

                        <button class="active:translate-y-1" wire:click="increment">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                 class="w-5 h-5">
                                <path fill-rule="evenodd"
                                      d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>

                    <x-button class="grow" wire:click="addCartItem" icon="shopping-cart">
                        {{ __('Add to cart') }} {{ $product->getFormattedTotalAmount($quantity) }}
                    </x-button>
                </div>
            </div>
        </x-slot:body>
    @endif
</x-offcanvas>
