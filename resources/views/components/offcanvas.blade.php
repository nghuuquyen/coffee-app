<div x-data="{ offcanvas: false }" class="z-50 fixed top-0 left-0 right-0 bottom-0" style="display: none;" x-show="offcanvas">
    <div class="h-full" x-on:display-offcanvas.window="offcanvas = true" x-on:close-offcanvas.window="offcanvas = false">
        <div x-show="offcanvas" x-transition:enter="transition fade-in duration-500"
             x-transition:leave="transition fade-out duration-200" x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-50" x-transition:leave-start="opacity-50" x-transition:leave-end="opacity-0"
             class="bg-zinc-700 opacity-50 w-full h-full" @click="offcanvas = false">
        </div>

        <div x-show="offcanvas" x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="translate-x-[100%] opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
             x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0 opacity-50"
             x-transition:leave-end="translate-x-[100%] opacity-0"
             class="bg-surface w-full lg:max-w-xs lg:min-w-[450px] flex flex-col absolute right-0 top-0 bottom-0">
            <div class="flex flex-row mb-3 px-2 py-4 border-b border-on-surface items-end justify-center relative text-on-surface-600">
                <button
                    class="btn btn-sm btn-primary btn-icon rounded-full absolute left-2 hover:rotate-90 ease-in duration-300"
                    @click="offcanvas = false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="35"
                         height="35" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>

                <h2 class="text-2xl text-on-surface-600">{{ $title ?? '' }}</h2>
            </div>

            <div class="p-4 grow flex flex-col justify-between">
                {{ $body ?? '' }}
            </div>
        </div>
    </div>
</div>
