<x-button {{ $attributes->merge([ 'class' => 'bg-surface text-on-surface-600 border border-gray-300 dark:border-gray-500 rounded-md tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</x-button>