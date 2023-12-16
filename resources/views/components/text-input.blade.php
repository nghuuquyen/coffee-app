<div class="flex flex-col w-full">
    @php
        $randomFieldId = \Illuminate\Support\Str::uuid();
        $messageBag = isset($errorBags) ? $errors->{$errorBags} : $errors;
    @endphp
    
    @isset($label)
        <label class="font-normal mb-1 text-on-surface-600 text-sm" for="input_{{  ($name ?? '_') . $randomFieldId }}">{{ $label }}</label>
    @endisset

    <input
        id="input_{{  ($name ?? '_') . $randomFieldId }}"
        {{ $attributes->merge([
            'class' =>
                'border text-on-surface-600 border-on-surface-300 px-2 py-3 rounded-lg bg-surface text-sm' .
                ($messageBag->has($name ?? null) ? ' border-red-500' : ''),
        ]) }}
        type="{{ $type ?? 'text' }}" placeholder="{{ $placeholder ?? '' }}"
        @if (isset($model)) wire:model="{{ $model }}" @endif
        @if (isset($name)) name="{{ $name }}" autocomplete="{{ $name }}" @endif
        @if (isset($readonly)) readonly @endif
        @if (isset($value)) value="{{ $value }}" @endif 
        autofocus
    />

    @error($name ?? '', $errorBags ?? null)
        <span class="text-sm block sm:inline text-red-500 mt-2">{{ $message }}</span>
    @enderror
</div>
