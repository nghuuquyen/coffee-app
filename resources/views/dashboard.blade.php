<x-user-layout>
    <x-slot name="page_title">
        {{ __('Dashboard') }}
    </x-slot>

    <section>
        <x-panel :header="__('Dashboard')">
            <div class="text-on-surface-600">
                <span>{{ __('Hello') }}</span>
                <b>{{ auth()->user()->name }},</b>
                <span>{{ __("You're logged in!") }}</span>
            </div>
        </x-panel>
    </section>
</x-user-layout>