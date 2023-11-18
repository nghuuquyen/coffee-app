@if (isset($href))
    <a href="{{ $href }}" target="{{ $target ?? '_blank' }}"
        {{ $attributes->merge(['class' => 'flex bg-primary-600 hover:bg-primary-700 text-on-primary-50 active:translate-y-1 rounded-lg lg:rounded-2xl px-6 py-2 flex-shrink-0 w-auto items-center justify-center']) }}>
        @includeIf('components/icons/' . ($icon ?? ''))

        @if(trim($slot))
            <span class="ml-2">
                {{ $slot }}
            </span>
        @endisset
    </a>
@else
    <button type="{{ $type ?? 'button' }}"
        {{ $attributes->merge(['class' => 'flex bg-primary-600 hover:bg-primary-400 text-on-primary-50 hover:text-on-primary active:translate-y-1 rounded-lg lg:rounded-2xl px-6 py-2 flex-shrink-0 w-auto items-center justify-center']) }}>
        @includeIf('components/icons/' . ($icon ?? ''))

        @if(trim($slot))
            <span class="{{ isset($icon) ? 'ml-2' : '' }}">
                {{ $slot }}
            </span>
        @endisset
    </button>
@endif
