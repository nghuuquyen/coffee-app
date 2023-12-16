@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg font-medium text-on-surface-600">
            {{ $title }}
        </div>

        <div class="mt-4 text-sm text-on-surface-500">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 bg-surface text-end">
        {{ $footer }}
    </div>
</x-modal>
