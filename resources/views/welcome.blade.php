<x-user-layout>
    @section('title', 'Homepage')

    @foreach ($categories as $category)
        <x-product-grids :category="$category" :products="$category['products']" />
    @endforeach
</x-user-layout>