<div x-data="{}" class="flex flex-row bg-surface p-3 w-full cursor-pointer hover:shadow-xl rounded"
     @click="$dispatch('USER_SELECT_PRODUCT_EVENT', { product_id: {{ $product->id }} })">
    <div class="flex-shrink-0">
        <img class="object-cover h-28 w-28 rounded" src="{{ $product->display_image_url }}?w=150&h=150"
             alt="product image" />
    </div>
    <div class="flex flex-col ml-4 w-full">
        <h2 class="text-xl text-on-surface-600">{{ $product->name }}</h2>
        <p class="mt-3 lg:mt-8 text-sm text-on-surface-500">{{ $product->description }}</p>
        <div class="flex flex-row justify-between mt-3 lg:mt-12">
            <span class="text-on-surface-600 font-bold text-xl">
                {{ $product->formatted_price }}
            </span>

            <button class="flex flex-row active:translate-y-1 bg-primary-500 justify-center items-center w-6 h-6 text-on-primary-50">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd"
                          d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                          clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
</div>
