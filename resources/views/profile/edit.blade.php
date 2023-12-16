<x-user-layout>
    <x-slot:title>
        {{ __('Profile') }}
    </x-slot:title>

    <div class="py-6" 
         x-data="{ status: @js(session('status'))}"
         x-init="
            if (['two-factor-authentication-enabled', 'two-factor-authentication-confirmed'].includes(status)) {
                document.getElementById('two-factor-authentication').scrollIntoView();
            }
         "
    >
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <x-panel>
                    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div class="flex flex-row items-center text-2xl text-on-surface-500">
                            <x-icon icon="info" />
                            <p class="text-sm text-on-surface-600 ml-2">
                                {{ __('Your email address is unverified.') }}
    
                                <button form="send-verification"
                                        class="underline text-sm text-primary-500 hover:text-primary-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>
                        </div>
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 px-2 text-sm text-on-surface-500">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </form>
                </x-panel>
            @endif
            
            <x-panel :header="__('Profile Information')" :sub-header="__('Update your account\'s profile information and email address.')">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </x-panel>

            <x-panel :header="__('Update Password')" :sub-header="__('Ensure your account is using a long, random password to stay secure.')">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </x-panel>

            <x-panel id="two-factor-authentication" :header="__('Two Factor Authentication')" :sub-header="__('Add additional security to your account using two factor authentication.')">
                <div class="max-w-xl">
                    @include('profile.partials.two-factor-authentication')
                </div>
            </x-panel>
                
            <x-panel>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </x-panel>
        </div>
    </div>
</x-user-layout>
