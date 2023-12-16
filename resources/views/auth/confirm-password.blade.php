<x-user-layout>
    <section>
        <x-panel class="max-w-xl m-auto" :header="__('Confirm Password')" :sub-header="__('This is a secure area of the application. Please confirm your password before continuing.')">
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <x-text-input class="block mt-1 w-full" type="password" name="password" :label="__('Password')" />

                <div class="flex justify-end mt-4">
                    <x-button type="submit">
                        {{ __('Confirm') }}
                    </x-button>
                </div>
            </form>
        </x-panel>
    </section>
</x-user-layout>
