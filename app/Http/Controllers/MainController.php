<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
//    Klasėje yra trys viešosios funkcijos: index(), categories(), ir product(). Kiekviena funkcija gražina
// atitinkamą vaizdą, view() funkcijos pagalba. Tai yra, kai vartotojas pasieks puslapį, kurio kelias yra
// apibrėžtas maršrute, funkcija bus iškviesta ir ji sugeneruos HTML, kuris bus rodomas vartotojui.
    public function index()
    {
        return view('index');
    }

    public function categories()
    {
        return view('categories');
    }
    public function product()
    {
        return view('product');
    }
}
