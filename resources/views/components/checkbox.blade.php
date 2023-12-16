<div class="flex flex-row">
    <label>
        <input
            {{ $attributes->merge([
                'class' =>
                    'border text-on-surface-600 border-on-surface-300 px-4 py-4 bg-surface ' .
                    ($errors->has($name ?? null) ? ' border-red-500' : ''),
            ]) }}
            type="checkbox"
            @if (isset($model)) wire:model="{{ $model }}" @endif
            @if (isset($name)) name="{{ $name }}" @endif
            @if (isset($readonly)) disabled @endif
            @if (isset($selected) && $selected === true) checked @endif
            @if (isset($value)) value="{{ $value }}" @endif 
        />
    </label>

    @isset($label)
        <label class="font-normal ml-2 text-on-surface-600">{{ $label }}</label>
    @endisset

    @error($name ?? '')
        <span class="text-sm block sm:inline text-red-500">{{ $message }}</span>
    @enderror
</div>
