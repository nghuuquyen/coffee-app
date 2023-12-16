<div>
    <!-- Generate API Token -->
    <x-panel :header="__('Create API Token')"
             :sub-header="__('API tokens allow third-party services to authenticate with our application on your behalf.')">
        <form wire:submit="createApiToken">
            <!-- Token Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-text-input name="name" :label="__('Token Name')" model="createApiTokenForm.name" autofocus/>
            </div>

            <!-- Token Permissions -->
            <div class="col-span-6">
                <label for="permissions" value="{{ __('Permissions') }}"/>

                <div class="mt-4 grid grid-cols-8 gap-4">
                    @foreach ($permissions as $permission)
                        <label class="flex items-center">
                            <x-checkbox wire:model="createApiTokenForm.permissions" :value="$permission"/>
                            <span class="ms-2 text-sm text-gray-600">{{ $permission }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center gap-4 mt-4 justify-end">
                <x-action-message class="me-3" on="created">
                    {{ __('Created.') }}
                </x-action-message>

                <x-button type="submit">
                    {{ __('Create API Token') }}
                </x-button>
            </div>
        </form>
    </x-panel>

    @if (auth()->user()->tokens->isNotEmpty())
        <!-- Manage API Tokens -->
        <div class="mt-10">
            <x-panel :header="__('Manage API Tokens')"
                     :sub-header="__('You may delete any of your existing tokens if they are no longer needed.')">
                <!-- API Token List -->
                <div class="space-y-6">
                    @foreach (auth()->user()->tokens->sortBy('name') as $token)
                        <div class="flex items-center justify-between">
                            <div class="break-all text-on-surface-600">
                                {{ $token->name }}
                            </div>

                            <div class="flex items-center ms-2">
                                @if ($token->last_used_at)
                                    <div class="text-sm text-on-surface-500">
                                        {{ __('Last used') }} {{ $token->last_used_at->diffForHumans() }}
                                    </div>
                                @endif

                                <button class="cursor-pointer ms-6 text-sm text-on-surface-500 underline"
                                        wire:click="manageApiTokenPermissions({{ $token->id }})">
                                    {{ __('Permissions') }}
                                </button>

                                <button class="cursor-pointer ms-6 text-sm text-red-500"
                                        wire:click="confirmApiTokenDeletion({{ $token->id }})">
                                    {{ __('Delete') }}
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-panel>
        </div>
    @endif

    <!-- Token Value Modal -->
    <x-dialog-modal name="displaying-token" focusable>
        <x-slot name="title">
            {{ __('API Token') }}
        </x-slot>

        <x-slot name="content">
            <div>
                {{ __('Please copy your new API token. For your security, it won\'t be shown again.') }}
            </div>
            <x-text-input
                x-ref="plaintextToken" type="text" readonly :value="$plainTextToken"
                class="mt-4 w-full break-all"
                autofocus autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                @showing-token-modal.window="setTimeout(() => $refs.plaintextToken.select(), 250)"
            />
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$dispatch('close')" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>

    <!-- API Token Permissions Modal -->
    <x-dialog-modal name="managing-api-token-permissions" focusable>
        <x-slot name="title">
            {{ __('API Token Permissions') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($permissions as $permission)
                    <label class="flex items-center">
                        <x-checkbox wire:model="updateApiTokenForm.permissions" :value="$permission"/>
                        <span class="ms-2 text-sm text-gray-600">{{ $permission }}</span>
                    </label>
                @endforeach
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$dispatch('close')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:click="updateApiToken" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Delete Token Confirmation Modal -->
    <x-confirmation-modal name="confirming-api-token-deletion">
        <x-slot name="title">
            {{ __('Delete API Token') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this API token?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$dispatch('close')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" wire:click="deleteApiToken" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
