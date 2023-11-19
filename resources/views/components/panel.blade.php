<div {{ $attributes->merge(['class' => 'bg-surface rounded-lg shadow-lg']) }}>
    @if (isset($header))
        <h1
            class="bg-surface text-2xl text-on-surface-600 border-b border-on-surface p-4 mb-2 flex flex-row items-center justify-between sticky top-0 rounded-t-lg z-10">
            <div class="flex flex-row items-center">
                @includeIf('components/icons/' . ($icon ?? ''))

                <span class="ml-2">{{ $header }}</span>
            </div>

            @if (isset($action))
                {{ $action }}
            @endif
        </h1>
    @endif

    <div class="p-6">
        {{ $slot }}
    </div>
</div>
