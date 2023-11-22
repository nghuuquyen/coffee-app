<x-user-layout>
    <section class="p-4 mt-6 px-2 py-2 lg:px-24">
        <form method="POST" action="{{ route('checkout.store') }}">
            @csrf

            <div class="flex flex-row justify-end mb-3">
                <x-button icon="arrow-uturn-left" href="{{ route('homepage') }}" target="_self"
                          class="bg-transparent text-on-surface-500 px-0 py-0 hover:text-on-surface-600 hover:bg-transparent">
                    {{ __('Continue to shopping') }}
                </x-button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-5">

                {{-- left column --}}
                <div class="col-span-3 grid grid-cols-1 gap-4">
                    {{-- shippting information form --}}
                    <x-panel icon="identification" header="{{ __('Shipping address') }}">
                        <div class="grid grid-cols-1 gap-6">
                            <div class="grid grid-cols-2 gap-4">
                                <x-text-input label="{{ __('Your name') }}" name="full_name"
                                              value="{{ old('full_name') }}"
                                              placeholder="{{ __('Please enter your name') }}"/>
                                <x-text-input label="{{ __('Phone number') }}" name="phone_number"
                                              value="{{ old('phone_number') }}"
                                              placeholder="{{ __('Please enter your phone number') }}"/>
                            </div>

                            <x-text-input label="{{ __('Your email') }}" name="email"
                                          value="{{ old('email') }}" placeholder="{{ __('Please enter your email') }}"/>

                            <x-text-input label="{{ __('Shipping address') }}" name="shipping_address"
                                          value="{{ old('shipping_address') }}"
                                          placeholder="{{ __('Please enter your address') }}"/>

                            <x-text-input label="{{ __('Notes') }}" name="notes" value="{{ old('notes') }}"
                                          placeholder="{{ __('Please enter your note if any') }}"/>
                        </div>
                    </x-panel>

                    {{-- cart items --}}
                    <x-panel icon="shopping-cart" header="{{ __('Cart Items') }}">
                        <ul>
                            @foreach ($cart->items as $item)
                                <li class="border-b-2 border-on-surface py-4 flex flex-row">
                                    <div class="flex-shrink-0">
                                        <img class="object-cover h-20 w-20 rounded"
                                             src="{{ $item->product->display_image_url }}?w=150&h=150"
                                             alt="product image"/>
                                    </div>

                                    <div class="flex flex-col ml-2 grow">
                                        <h2 class="text-base text-on-surface-600"> {{ $item->quantity }}x
                                            {{ $item->product->name }}
                                        </h2>
                                        <p class="mt-2 text-sm text-on-surface-500">{{ $item->notes }}</p>
                                    </div>

                                    <div class="flex-shrink-0">
                                            <span class="text-on-surface-600 font-bold text-base">
                                                {{ $item->product->getFormattedTotalAmount($item->quantity) }}
                                            </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </x-panel>
                </div>

                {{-- right column --}}
                <div class="col-span-2 mt-4 lg:mt-0 lg:pl-6">
                    <x-panel header="{{ __('Payments') }}" icon="banknotes" class="sticky top-0">

                        <x-text-input label="{{ __('Coupon') }}" name="coupon_code" value="{{ old('email') }}"
                                      placeholder="{{ __('Please enter coupon code if any') }}"/>

                        <ul class="text-on-surface-600">
                            <li class="flex flex-row items-center justify-between mt-4 lg:mt-8">
                                <span class="text-lg text-on-surface-700">{{ __('Subtotal') }}</span>

                                <span class="text-base font-bold">
                                        {{ $cart->formatted_total_amount }}
                                    </span>
                            </li>

                            <li class="flex flex-row items-center justify-between mt-4 lg:mt-8">
                                <span class="text-lg text-on-surface-700">{{ __('Shipping Fee') }}</span>

                                <span class="text-base font-bold lowercase">
                                        {{ __('Free') }}
                                    </span>
                            </li>

                            <li class="flex flex-row items-center justify-between mt-4 lg:mt-8">
                                <span class="text-lg text-on-surface-700">{{ __('Total') }}</span>

                                <span class="text-2xl font-bold">
                                        {{ $cart->formatted_total_amount }}
                                    </span>
                            </li>
                        </ul>

                        <x-button class="grow w-full mt-6" type="submit" icon="credit-card">
                            {{ __('Send Order') }}
                        </x-button>
                    </x-panel>
                </div>
            </div>
        </form>
    </section>

    {{-- add more space for avoid cart bar override content --}}
    <div class="w-full min-h-[50px]"></div>
</x-user-layout>
