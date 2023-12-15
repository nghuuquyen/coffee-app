<section>
    <form method="POST" action="{{ route('user-profile-information.update') }}" class="grid grid-cols-1 gap-6">
        @csrf
        @method('put')
        
        <x-text-input 
            name="name" :label="__('Name')" 
            :value="old('name', $user->name)" error-bags="updateProfileInformation"/>
        
        <x-text-input 
            name="email" :label="__('Email')" 
            :value="old('email', $user->email)" error-bags="updateProfileInformation"/>

        <div class="flex items-center gap-4">
            <x-button type="submit">{{ __('Save') }}</x-button>

            @if (session('status') === 'profile-information-updated')
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
