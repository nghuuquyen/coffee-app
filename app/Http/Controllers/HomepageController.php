<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomepageController extends Controller
{
    public function index()
    {
        $categories = Category::query()->with('products')->get();
        
        return view('homepage', [
            'categories' => $categories,
        ]);
    }
}
