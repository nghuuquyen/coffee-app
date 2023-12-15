<section>
    <form method="POST" action="{{ route('user-password.update') }}" class="grid grid-cols-1 gap-6">
        @csrf
        @method('put')

        <x-text-input
            type="password" name="current_password" :label="__('Current Password')" error-bags="updatePassword"/>

        <x-text-input
            type="password" name="password" :label="__('New Password')" error-bags="updatePassword"/>

        <x-text-input
            type="password" name="password_confirmation" :label="__('Confirm Password')" error-bags="updatePassword"/>
        
        <div class="flex items-center gap-4">
            <x-button type="submit">{{ __('Save') }}</x-button>
            
            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
