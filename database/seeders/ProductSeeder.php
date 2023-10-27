<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    public const DEFAULT_CURRENCY = 'VNĐ';
    
    public $products = [
        [
            'id' => 1,
            'category_id' => 1,
            'name' => 'Cappuchino',
            'description' => 'Cappuccino is a coffee drink that today is typically composed of a single espresso shot and hot milk',
            'price' => 35000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'id' => 2,
            'category_id' => 1,
            'name' => 'Cappuchino',
            'description' => 'Cappuccino is a coffee drink that today is typically composed of a single espresso shot and hot milk',
            'price' => 35000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'id' => 3,
            'category_id' => 1,
            'name' => 'Cappuchino',
            'description' => 'Cappuccino is a coffee drink that today is typically composed of a single espresso shot and hot milk',
            'price' => 35000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'id' => 4,
            'category_id' => 1,
            'name' => 'Cappuchino',
            'description' => 'Cappuccino is a coffee drink that today is typically composed of a single espresso shot and hot milk',
            'price' => 35000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'id' => 5,
            'category_id' => 1,
            'name' => 'Cappuchino',
            'description' => 'Cappuccino is a coffee drink that today is typically composed of a single espresso shot and hot milk',
            'price' => 35000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'id' => 6,
            'category_id' => 1,
            'name' => 'Cappuchino',
            'description' => 'Cappuccino is a coffee drink that today is typically composed of a single espresso shot and hot milk',
            'price' => 35000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'id' => 7,
            'category_id' => 2,
            'name' => 'Chicken satay salad',
            'description' => 'Marinate chicken breasts, then drizzle with a punchy peanut satay sauce',
            'price' => 50000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'id' => 8,
            'category_id' => 2,
            'name' => 'Chicken satay salad',
            'description' => 'Marinate chicken breasts, then drizzle with a punchy peanut satay sauce',
            'price' => 50000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'id' => 9,
            'category_id' => 2,
            'name' => 'Chicken satay salad',
            'description' => 'Marinate chicken breasts, then drizzle with a punchy peanut satay sauce',
            'price' => 50000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'id' => 10,
            'category_id' => 2,
            'name' => 'Chicken satay salad',
            'description' => 'Marinate chicken breasts, then drizzle with a punchy peanut satay sauce',
            'price' => 50000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'id' => 11,
            'category_id' => 2,
            'name' => 'Chicken satay salad',
            'description' => 'Marinate chicken breasts, then drizzle with a punchy peanut satay sauce',
            'price' => 50000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
        [
            'id' => 12,
            'category_id' => 2,
            'name' => 'Chicken satay salad',
            'description' => 'Marinate chicken breasts, then drizzle with a punchy peanut satay sauce',
            'price' => 50000,
            'display_image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
        ],
    ];

    private function getProducts()
    {
        return collect($this->products);
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getProducts() as $product) {
            $product['currency'] = self::DEFAULT_CURRENCY;

            Product::create($product);
        }
    }
}
