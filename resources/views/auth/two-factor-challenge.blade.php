<x-user-layout>
    <section>
        <x-panel :header="__('Two Factor Authentication')" x-data="{ recovery: false }" class="max-w-xl m-auto">
            <div class="mb-4 text-on-surface-600" x-show="! recovery">
                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
            </div>

            <div class="mb-4 text-on-surface-600" x-cloak x-show="recovery">
                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
            </div>

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" x-show="! recovery">
                    <x-text-input type="text" :label="__('Code')" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                </div>

                <div class="mt-4" x-cloak x-show="recovery">
                    <x-text-input type="text" :label="__('Recovery Code')" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="text-on-surface-600 underline cursor-pointer"
                            x-show="! recovery"
                            x-on:click="
                                    recovery = true;
                                    $nextTick(() => { $refs.recovery_code.focus() })
                                ">
                        {{ __('Use a recovery code') }}
                    </button>

                    <button type="button" class="text-on-surface-600 underline cursor-pointer"
                            x-cloak
                            x-show="recovery"
                            x-on:click="
                                    recovery = false;
                                    $nextTick(() => { $refs.code.focus() })
                                ">
                        {{ __('Use an authentication code') }}
                    </button>

                    <x-button type="submit" class="ms-4">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </x-panel>
    </section>
</x-user-layout>
