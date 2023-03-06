<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function categories()
    {
        return view('categories');
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
