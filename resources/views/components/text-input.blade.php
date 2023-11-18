<div class="flex flex-col w-full">
    @isset($label)
        <label class="font-normal mb-2 text-on-surface-600">{{ $label ?? '' }}</label>
    @endisset

    <input
        {{ $attributes->merge([
            'class' =>
                'border text-on-surface-600 border-on-surface-300 px-4 py-4 bg-surface ' .
                ($errors->has($name ?? null) ? ' border-red-500' : ''),
        ]) }}
        type="{{ $type ?? 'text' }}" placeholder="{{ $placeholder ?? '' }}"
        @if (isset($model)) wire:model="{{ $model }}" @endif
        @if (isset($name)) name="{{ $name }}" @endif
        @if (isset($readonly)) readonly="true" @endif
        @if (isset($value)) value="{{ $value }}" @endif />

    @error($name ?? '')
        <span class="text-sm block sm:inline text-red-500">{{ $message }}</span>
    @enderror
</div>
