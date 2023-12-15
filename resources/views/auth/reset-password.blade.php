<x-user-layout>
    <x-slot name="page_title">
        {{ __('Reset Password') }}
    </x-slot>

    <section>
        <x-panel icon="cube" header="{{ __('Reset Password') }}">
            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                <input type="hidden" name="token" value="{{ request()->route('token') }}" />
                <input type="hidden" name="email" value="{{ request()->string('email') }}" />

                <div class="flex flex-col">
                    {{-- line attribute --}}
                    <div class="grid grid-cols-5 pb-6 pt-6 items-center border-b border-on-surface-900">
                        <div class="col-span-1 text-on-surface-500 font-bold">
                            <label>{{ __('Email') }}</label>
                        </div>
                        <div class="col-span-4 text-on-surface-600">
                            <span>{{ request()->string('email') }}</span>
                        </div>
                    </div>

                    {{-- line attribute --}}
                    <div class="grid grid-cols-5 pb-6 pt-6 items-center border-b border-on-surface-900">
                        <div class="col-span-1 text-on-surface-500 font-bold">
                            <label>{{ __('Password') }}</label>
                        </div>
                        <div class="col-span-4 text-on-surface-600">
                            <x-text-input type="password" name="password" value="{{ old('password') }}"
                                          placeholder="{{ __('Please input this field') }}" />
                        </div>
                    </div>

                    {{-- line attribute --}}
                    <div class="grid grid-cols-5 pb-6 pt-6 items-center border-b border-on-surface-900">
                        <div class="col-span-1 text-on-surface-500 font-bold">
                            <label>{{ __('Confirm Password') }}</label>
                        </div>
                        <div class="col-span-4 text-on-surface-600">
                            <x-text-input type="password" name="password_confirmation"
                                          value="{{ old('password_confirmation') }}"
                                          placeholder="{{ __('Please input this field') }}" />
                        </div>
                    </div>
                </div>

                <div class="flex flex-row justify-end mt-10">
                    <x-button type="reset"
                              class="bg-transparent text-on-surface-500 px-0 py-0 hover:text-on-surface-600 hover:bg-transparent">
                        {{ __('Cancel') }}
                    </x-button>

                    <x-button type="submit" class="text-base font-normal">
                        {{ __('Reset Password') }}
                    </x-button>
                </div>
            </form>
        </x-panel>
    </section>
</x-user-layout>
