<div class="px-2 py-2 lg:px-12" id="category_{{ $category['id'] }}">
    <h1 class="text-4xl py-6 text-on-background">{{ $category['name'] }}</h1>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        @foreach ( $products as $product )
            <x-product-card :product="$product" />
        @endforeach
    </div>
</div>