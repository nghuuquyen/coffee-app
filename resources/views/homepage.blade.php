<x-user-layout>
    @section('title', 'Homepage')

    <x-slot name="navigation">
        <x-navigation :categories="$categories" />
    </x-slot>
    
    @foreach ($categories as $category)
        <x-product-grids :category="$category" :products="$category['products']"/>
    @endforeach

    <x-slot name="components">
        <livewire:checkout.cart-bar />
        
        <livewire:checkout.add-cart-item-popup />
    </x-slot>
</x-user-layout>