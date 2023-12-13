<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_able_to_get_category()
    {
        $product = Product::factory()->create();

        $this->assertInstanceOf(Category::class, $product->category);
    }

    public function test_able_to_get_formatted_price_attribute()
    {
        $product = Product::factory()->create();

        $expected_results = number_format($product->price) . ' ' . $product->currency;

        $this->assertSame($expected_results, $product->formatted_price);
    }

    public function test_able_to_get_formatted_total_amount()
    {
        $quantity = rand(3, 10);

        $product = Product::factory()->create();

        $expected_results = number_format($product->price * $quantity) . ' ' . $product->currency;

        $this->assertSame($expected_results, $product->getFormattedTotalAmount($quantity));
    }
}
