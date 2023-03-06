<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
//
    public function index()
    {
        return view('index');
    }

    public function categories() {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($code) {
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }


//     Ši funkcija turi vieną parametrą $product, kuris yra numatytasis null reikšmė. Funkcija grąžina vaizdą,
// kuris yra nurodytas kaip menClothes, ir perduoda product kintamąjį į vaizdą kaip asociatyvų masyvą
// ['product'=>$product]. Tai reiškia, kad product kintamasis bus pasiekiamas kaip product kintamasis per vaizdą,
// ir null, jei product parametras nebuvo nurodytas maršrute arba buvo nurodytas kaip null.
    public function product($product=null)
    {
        return view('menClothes',['product'=>$product] );
    }
}
