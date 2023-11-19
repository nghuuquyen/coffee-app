<x-user-layout>
    @section('title', 'Homepage')

    <x-slot name="navigation">
        <x-navigation :categories="$categories" />
    </x-slot>
    
    @foreach ($categories as $category)
        <x-product-grids :category="$category" :products="$category['products']"/>
    @endforeach

    {{-- add more space for avoid cart bar override content --}}
    <div class="w-full min-h-[150px]"></div>
    
    <x-slot name="components">
        <livewire:checkout.cart-bar />
        
        <livewire:checkout.add-cart-item-popup />
    </x-slot>
</x-user-layout>