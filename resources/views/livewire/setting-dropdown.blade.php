<div class="flex justify-center absolute right-12 top-5 z-20 rounded-lg">
    <div x-data="{
        open: false,
        selectedTheme: $wire.entangle('theme'),
        selectedLocale: $wire.entangle('locale'),
        toggle() {
            if (this.open) {
                return this.close()
            }
    
            this.$refs.button.focus()
    
            this.open = true
        },
        close(focusAfter) {
            if (!this.open) return
    
            this.open = false
    
            focusAfter && focusAfter.focus()
        },
        setLocale(locale) {
            $wire.setLocale(locale)
    
            location.reload()
        },
        setTheme(targetTheme) {
            $wire.setTheme(targetTheme)
        }
    }" x-on:keydown.escape.prevent.stop="close($refs.button)"
         x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
         class="relative">
        <!-- Button -->
        <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
                type="button" class="flex flex-row text-on-surface-600 active:translate-y-1 items-center">
            @auth
                <span class="mr-2 hidden md:block text-sm">{{ __('Hi, ') }}{{ auth()->user()->name }}</span>
            @endauth

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd"
                      d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"
                      clip-rule="evenodd"/>
            </svg>
        </button>

        <!-- Panel -->
        <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
             :id="$id('dropdown-button')" style="display: none;"
             class="absolute right-0 top-10 rounded-lg bg-surface shardow-xl w-64 shadow-lg p-4 text-sm">
            <div class="text-on-surface-500 p-3">
                {{ __('Themes') }}
            </div>

            <a @click="setTheme('theme-light')"
               :class="selectedTheme === 'theme-light' ? 'bg-primary-600 text-on-primary-50' : 'bg-surface text-on-surface-500'"
               class="cursor-pointer flex items-center gap-1 w-full rounded px-6 py-2 text-left text-sm hover:bg-primary-600 hover:text-on-primary-50 disabled:text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/>
                </svg>

                <span class="ml-4">{{ __('Light') }}</span>
            </a>

            <a @click="setTheme('theme-dark')"
               :class="selectedTheme === 'theme-dark' ? 'bg-primary-600 text-on-primary-50' : 'bg-surface text-on-surface-500'"
               class="cursor-pointer flex items-center gap-1 w-full rounded px-6 py-2 text-left text-sm hover:bg-primary-600 hover:text-on-primary-50 disabled:text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/>
                </svg>

                <span class="ml-4">{{ __('Dark') }}</span>
            </a>

            <a @click="setTheme('auto')"
               :class="selectedTheme === 'auto' ? 'bg-primary-600 text-on-primary-50' : 'bg-surface text-on-surface-500'"
               class="cursor-pointer flex items-center gap-1 w-full rounded px-6 py-2 text-left text-sm hover:bg-primary-600 hover:text-on-primary-50 disabled:text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                </svg>

                <span class="ml-4">{{ __('System') }}</span>
            </a>

            <div class="text-on-surface-500 p-3">
                {{ __('Languages') }}
            </div>

            <a @click="setLocale('en')"
               :class="selectedLocale === 'en' ? 'bg-primary-600 text-on-primary-50' : 'bg-surface text-on-surface-500'"
               class="cursor-pointer flex items-center gap-1 w-full rounded px-6 py-2 text-left text-sm hover:bg-primary-600 hover:text-on-primary-50 disabled:text-gray-500">
                <span class="fi fi-gb"></span>

                <span class="ml-4">{{ __('English') }}</span>
            </a>

            <a @click="setLocale('vi')"
               :class="selectedLocale === 'vi' ? 'bg-primary-600 text-on-primary-50' : 'bg-surface text-on-surface-500'"
               class="cursor-pointer flex items-center gap-1 w-full rounded px-6 py-2 text-left text-sm hover:bg-primary-600 hover:text-on-primary-50 disabled:text-gray-500">
                <span class="fi fi-vn"></span>

                <span class="ml-4">{{ __('Vietnamese') }}</span>
            </a>

            <a @click="setLocale('ja')"
               :class="selectedLocale === 'ja' ? 'bg-primary-600 text-on-primary-50' : 'bg-surface text-on-surface-500'"
               class="cursor-pointer flex items-center gap-1 w-full rounded px-6 py-2 text-left text-sm hover:bg-primary-600 hover:text-on-primary-50 disabled:text-gray-500">
                <span class="fi fi-jp"></span>

                <span class="ml-4">{{ __('Japanese') }}</span>
            </a>

            @auth
                <div class="text-on-surface-500 p-3">
                    {{ __('Account') }}
                </div>
                <a href="{{ route('dashboard') }}"
                   class="bg-surface text-on-surface-500 cursor-pointer flex items-center gap-1 w-full rounded px-6 py-2 text-left text-sm hover:bg-primary-600 hover:text-on-primary-50 disabled:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                    </svg>
                    <span class="ml-4">{{ __('Dashboard') }}</span>
                </a>
                <a href="{{ route('profile.edit') }}"
                   class="bg-surface text-on-surface-500 cursor-pointer flex items-center gap-1 w-full rounded px-6 py-2 text-left text-sm hover:bg-primary-600 hover:text-on-primary-50 disabled:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd"
                              d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"
                              clip-rule="evenodd" />
                    </svg>
                    <span class="ml-4">{{ __('Settings') }}</span>
                </a>
                <a href="{{ route('apiTokens.index') }}"
                   class="bg-surface text-on-surface-500 cursor-pointer flex items-center gap-1 w-full rounded px-6 py-2 text-left text-sm hover:bg-primary-600 hover:text-on-primary-50 disabled:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                    </svg>
                    <span class="ml-4">{{ __('API Tokens') }}</span>
                </a>
            
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                            class="bg-surface text-on-surface-500 cursor-pointer flex items-center gap-1 w-full rounded px-6 py-2 text-left text-sm hover:bg-primary-600 hover:text-on-primary-50 disabled:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        <span class="ml-4">{{ __('Logout') }}</span>
                    </button>
                </form>
            @else
                <div class="text-on-surface-500 p-3">
                    {{ __('Account') }}
                </div>
                <a href="{{ route('register') }}"
                   class="bg-surface text-on-surface-500 cursor-pointer flex items-center gap-1 w-full rounded px-6 py-2 text-left text-sm hover:bg-primary-600 hover:text-on-primary-50 disabled:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="ml-4">{{ __('Register') }}</span>
                </a>
                <a href="{{ route('login') }}"
                   class="bg-surface text-on-surface-500 cursor-pointer flex items-center gap-1 w-full rounded px-6 py-2 text-left text-sm hover:bg-primary-600 hover:text-on-primary-50 disabled:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    <span class="ml-4">{{ __('Login') }}</span>
                </a>
            @endauth
        </div>
    </div>
</div>
