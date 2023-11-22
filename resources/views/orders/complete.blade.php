<x-user-layout>
    <section class="p-4 mt-6 px-2 py-2 lg:px-24">
        <div class="flex flex-col items-center justify-center">
            <img class="w-64" src="/imgs/celebrate.png" alt="Celebrate"/>

            <h1 class="text-3xl font-bold mt-3 text-on-background uppercase">{{ __('Thank you') }}!</h1>

            <h2 class="text-on-background">{{ __('Your order number is') }} <span
                    class="font-bold">{{ $order->code }}</span>
            </h2>
            <p class="text-on-surface-500 mt-6 max-w-screen-sm text-center">
                {{ __('We are getting started on your order right away, and you will receive an order comfirmtion email shortly to') }}
                <span class="font-bold text-on-background">{{ $order->email }}</span>
            </p>

            <x-button class="mt-5 uppercase" href="{{ $order->getCheckoutConfirmtionPath() }}">
                {{ __('View order confirmation') }}
            </x-button>
        </div>
    </section>
</x-user-layout>
