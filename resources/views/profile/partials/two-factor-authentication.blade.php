<section>
    @if(! auth()->user()->hasEnabledTwoFactorAuthentication())
        @if (session('status') == 'two-factor-authentication-enabled')
            <form method="POST" action="{{ route('two-factor.confirm') }}" class="grid grid-cols-1 gap-6">
                @csrf

                <div class="flex flex-col text-on-surface-600">
                    <span class="mb-1 font-bold">
                        Finish enabling two-factor authentication.
                    </span>
                    <span class="text-sm mb-1">
                        When two-factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application.
                    </span>
                    <span class="text-sm font-bold">
                        To finish enabling two-factor authentication, scan the following QR code using your phone's authenticator application or enter the setup key and provide the generated OTP code.
                    </span>
                </div>

                <div class="p-4 bg-white w-fit">
                    {!! request()->user()->twoFactorQrCodeSvg() !!}
                </div>

                <div class="flex flex-row text-on-surface-600 font-bold">
                    <span>{{ __('Setup Key') }}:</span>
                    <span class="ml-2">{{ decrypt(auth()->user()->two_factor_secret) }}</span>
                </div>

                <x-text-input
                    type="text" name="code" :label="__('Code')"/>

                <div class="flex items-center gap-4">
                    <x-button type="submit">{{ __('Confirm') }}</x-button>
                </div>
            </form>
        @else
            <form method="POST" action="{{ route('two-factor.enable') }}" class="grid grid-cols-1 gap-6">
                @csrf
                <div class="flex flex-col text-on-surface-600">
                    <span class="mb-1 font-bold">
                        You have not enabled two-factor authentication.
                    </span>
                    <span class="text-sm">
                        When two-factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application.
                    </span>
                </div>
                <div class="flex items-center gap-4">
                    <x-button type="submit">{{ __('Enable') }}</x-button>
                </div>
            </form>
        @endif
    @else
        @if (session('status') == 'two-factor-authentication-confirmed')
        @endif

        <div class="flex flex-col mb-4 text-on-surface-600">
            <span class="mb-4 font-bold">You have enabled two-factor authentication.</span>
            <span class="text-sm">When two-factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application.</span>
        </div>

        <div>
            <details class="text-on-surface-500 mt-2 mb-4 text-sm font-bold">
                <summary class="cursor-pointer">{{ __('Recovery Codes') }}</summary>
                <div>
                    <span class="text-on-surface-600 text-sm font-normal">Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two-factor authentication device is lost.</span>
                    
                    <div class="flex flex-col p-4 bg-gray-100 rounded-lg mt-2 text-sm">
                        @forEach(auth()->user()->recoveryCodes() as $code)
                            <span class="font-normal">{{  $code }}</span>
                        @endforEach    
                    </div>
                    
                    <form method="POST" action="{{ route('two-factor.recovery-codes') }}" class="mt-2 w-full flex justify-end">
                        @csrf
                        <x-button type="submit" class="bg-transparent p-0 underline underline-offset-4 text-on-surface-600 hover:bg-transparent font-normal -mr-4 -mt-2">
                            {{ __('Regenerate Recovery Code') }}
                        </x-button>
                    </form>
                </div>
            </details>
        </div>
        <div class="flex flex-row py-4">
            <form method="POST" action="{{ route('two-factor.disable') }}">
                @csrf
                @method('DELETE')
                
                <x-danger-button type="submit">
                    {{ __('Disable 2FA') }}
                </x-danger-button>
            </form>
        </div>
    @endif
</section>
