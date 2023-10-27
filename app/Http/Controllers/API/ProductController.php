<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database\Query\Builder;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Product::query()
            ->when(request('with'), function(Builder $query, $with) {
                $query->with(explode(',', $with));
            })
            ->when(request('search'), function(Builder $query, $search) {
                return $query->where('name', 'like', '%'.$search);
            });

        return $query->simplePaginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'currency' => 'required|string',
            'display_image_url' => 'required|url',
            'category_id' => 'required|exists:categories',
        ]);

        return Product::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->loadMissing(explode(',', request('with', '')));

        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'nullable|unique:categories|max:255',
            'description' => 'nullable|max:255',
            'price' => 'nullable|numeric',
            'currency' => 'nullable|string',
            'display_image_url' => 'nullable|url',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $product->update($validated);

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return $product;
    }
}
