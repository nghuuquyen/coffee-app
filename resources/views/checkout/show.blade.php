<x-user-layout>
    <section>
        {{-- invoice --}}
        <div class="bg-surface rounded-xl text-on-surface-600 p-4 lg:p-10 shadow-lg">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-2 lg:gap-4">
                {{-- first column --}}
                <div class="col-span-2 grid gird-cols-1 gap-6 lg:border-r-2 lg:border-r-on-surface-500">
                    <h1 class="text-5xl text-center lg:text-left uppercase">{{ __('Invoice') }}</h1>

                    <div class="flex flex-col">
                        <h2 class="text-xs font-bold text-on-surface-500 uppercase">{{ __('Order ID') }}</h2>
                        <span class="text-base">{{ $order->code }}</span>
                    </div>

                    <div class="flex flex-col">
                        <h2 class="text-xs font-bold text-on-surface-500 uppercase">{{ __('Issue date') }}</h2>
                        <span class="text-base">
                                {{ $order->created_at->format('Y-m-d') }} <span
                                class="text-on-surface-500 text-xs">({{ $order->created_at->diffForHumans() }})</span>
                            </span>
                    </div>

                    <div class="flex flex-col">
                        <h2 class="text-xs font-bold text-on-surface-500 uppercase">{{ __('Status') }}</h2>
                        <span class="text-base">Processing</span>
                    </div>
                </div>

                {{-- second column --}}
                <div class="col-span-3 grid gird-cols-1 gap-6">
                    <div class="flex flex-col">
                        <h2 class="text-xs font-bold text-on-surface-500 uppercase">{{ __('Full name') }}</h2>
                        <span class="text-base">{{ $order->full_name }}</span>
                    </div>

                    <div class="flex flex-col">
                        <h2 class="text-xs font-bold text-on-surface-500 uppercase">{{ __('Email address') }}</h2>
                        <span class="text-base">{{ $order->email }}</span>
                    </div>

                    <div class="flex flex-col">
                        <h2 class="text-xs font-bold text-on-surface-500 uppercase">{{ __('Phone number') }}</h2>
                        <span class="text-base">{{ $order->phone_number }}</span>
                    </div>

                    <div class="flex flex-col">
                        <h2 class="text-xs font-bold text-on-surface-500 uppercase">{{ __('Shipping address') }}
                        </h2>
                        <span class="text-base">{{ $order->shipping_address }}</span>
                    </div>

                    <div class="flex flex-col">
                        <h2 class="text-xs font-bold text-on-surface-500 uppercase">{{ __('Notes') }}</h2>
                        <span class="text-base">{{ $order->notes }}</span>
                    </div>
                </div>
            </div>

            <div>
                {{-- cart items table --}}
                <div class="relative overflow-x-auto mt-10 mb-10">
                    <table class="w-full text-left table-auto">
                        <thead class="font-bold text-on-surface-800 uppercase bg-on-surface-200">
                        <tr>
                            <th scope="col" class="text-xs font-bold px-2 py-3">
                                {{ __('Product name') }}
                            </th>
                            <th scope="col" class="text-xs font-bold px-2 py-3">
                                {{ __('Notes') }}
                            </th>
                            <th scope="col" class="text-xs font-bold px-2 py-3">
                                {{ __('Unit price incl. VAT') }}
                            </th>
                            <th scope="col" class="text-xs font-bold px-2 py-3">
                                {{ __('Quantity') }}
                            </th>
                            <th scope="col" class="text-xs font-bold px-2 py-3">
                                {{ __('Total') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->cart->items as $item)
                            <tr class="border-b-2 border-on-surface-900 border-on-surface">
                                <th class="text-base px-2 py-4 font-normal">
                                    {{ $item->product->name }}
                                </th>
                                <td class="text-base px-2 py-4">
                                    {{ $item->notes }}
                                </td>
                                <td class="text-base px-2 py-4">
                                    {{ number_format($item->product->price) }} {{ $item->product->currency }}
                                </td>
                                <td class="text-base px-2 py-4">
                                    {{ $item->quantity }}
                                </td>
                                <td class="text-base px-2 py-4">
                                    {{ $item->product->getFormattedTotalAmount($item->quantity) }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- payment summary --}}
                <div class="flex flex-row justify-end rounded-lg lg:px-0 bg-surface">
                    <ul class="w-full lg:px-0 lg:w-2/5">
                        <li class="flex flex-row items-center justify-between py-2">
                            <h2 class="text-sm font-bold uppercase text-on-surface-500">{{ __('Subtotal') }}</h2>

                            <span class="text-base">
                                    {{ number_format($order->cart->total_amount) }} {{ $order->cart->currency }}
                                </span>
                        </li>

                        <li class="flex flex-row items-center justify-between py-2">
                            <h2 class="text-sm font-bold uppercase text-on-surface-500">{{ __('Shipping Fee') }}
                            </h2>

                            <span class="text-base lowercase">
                                    {{ __('Free') }}
                                </span>
                        </li>

                        <li class="flex flex-row items-center justify-between py-2">
                            <h2 class="text-sm font-bold uppercase text-on-surface-500">{{ __('Total') }}</h2>

                            <span class="text-2xl font-bold">
                                    {{ number_format($order->cart->total_amount) }} {{ $order->cart->currency }}
                                </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</x-user-layout>
