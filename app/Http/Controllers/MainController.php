<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;

class MainController extends Controller
{
//
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

//    public function category($code)
//    {
//        $category = Category::where('code', $code)->first();
//
//        return view('category', compact('category'));
//    }
    public function category($code)
    {
        $category = Category::where('code', $code)->firstOrFail();
        return view('category', ['category' => $category]);
    }

    public function product($category, $product = null)
    {
        return view('menClothes', ['product' => $product]);
    }

    public function basket()
    {
        return view('basket');
    }

    public function basketPlace()
    {
        return view('order');
    }
}
