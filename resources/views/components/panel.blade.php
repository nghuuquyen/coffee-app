<div {{ $attributes->merge(['class' => 'bg-surface rounded-lg shadow-lg']) }}>
    @if (isset($header))
        <h1
            class="bg-surface text-2xl text-on-surface-600 border-b border-on-surface p-4 flex flex-row items-center justify-between sticky top-0 rounded-t-lg z-10">
            <div class="flex flex-row items-center">
                @includeIf('components/icons/' . ($icon ?? ''))

                <div class="flex flex-col">
                    <span class="ml-2">{{ $header }}</span>
                    @if(isset($subHeader))
                        <span class="ml-2 mt-1 text-sm text-on-surface-500">
                            {{ __($subHeader) }}
                        </span>
                    @endif
                </div>
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
