<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
//
    public function index()
    {
        return view('index');
    }

    public function categories()
    {
        return view('categories');
    }

//    funkcija, kuri priima kintamąjį $category ir grąžina category vaizdo šabloną su category kintamuoju, kuris yra
// perduodamas į vaizdą. Tai reiškia, kad, kai vartotojas naršyklėje suveda URL, pvz. localhost//menClothes,
// tada jis yra nukreipiamas į šią funkciją, kurioje kintamasis $category yra nustatomas kaip menClothes ir yra
// siunčiamas į vaizdo šabloną category.blade.php. Šis vaizdas tada gali naudoti $category kintamąjį, kad parodytų
// tinkamą informaciją, susijusią su pasirinkta kategorija.
    public function category($category)
    {
        return view('category', compact ('category'));
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
