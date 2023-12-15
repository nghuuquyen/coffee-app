<x-user-layout>
    <x-slot name="page_title">
        {{ __('Dashboard') }}
    </x-slot>
    
    <section>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <b>{{ auth()->user()->name }},</b> {{ __("You're logged in!") }}
                    </div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit"
                                    class="bg-surface text-on-surface-500 cursor-pointer flex items-center gap-1 w-full rounded px-6 py-2 text-left text-base hover:bg-primary-600 hover:text-on-primary-50 disabled:text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                </svg>
                                <span class="ml-4">{{ __('Logout') }}</span>
                            </button>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-user-layout>