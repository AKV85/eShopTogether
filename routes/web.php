<?php

use App\Http\Controllers\MainController;
// kodas naudojamas importuoti MainController klasę, kad būtų galima naudoti jos funkcijas maršrutų apibrėžimuose.
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//vartotojas prisijungia į pagrindinį puslapį, t.y. "/", Laravel turės panaudoti "MainController" klasę,
// kad sugeneruotų puslapio turinį. Konkrečiai, jis naudos "index" funkciją, kuri turėtų grąžinti HTML,
// kuris bus rodomas vartotojui.
Route::get('/', [MainController::class, 'index'])->name('index');

//maršrutas nurodo, kad kai vartotojas eina į "categories" puslapį, Laravel turės vėl naudoti "MainController" klasę,
// bet šį kartą naudodamas "categories" funkciją, kad sugeneruotų puslapio turinį. Ši funkcija gali atlikti tam
// tikrus veiksmus, pvz., gauti kategorijas iš duomenų bazės ir atvaizduoti jas vartotojui.
Route::get('/categories', [MainController::class, 'categories'])->name('categories');

//Šis kodas aprašo maršrutą, kuris turi reaguoti į URL adresą su kintamuoju 'category'. Tai reiškia, kad nurodžius bet
// kokią kategoriją URL adrese, pvz. "/menClothes" arba "/womenClothes", šis maršrutas bus naudojamas ir bus iškviesta
// 'MainController' kategorijos funkcija, kad būtų atvaizduota atitinkama kategorija.
Route::get('/{category}', [MainController::class, 'category'])->name('category');

//Šis kodas aprašo maršrutą, kuriuo pasiekiamas product metodas MainController
// klasėje. Maršrutas yra pasiekiamas adresu /menClothes/{product?}, kur {product?} reiškia, kad product yra
// pasirenkamas parametras. Tai reiškia, kad galima pasiekti šį maršrutą tiek su, tiek be product parametro.
Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');

Route::get('/basket', [MainController::class, 'basket'])->name('basket');
Route::get('/basket/place', [MainController::class, 'basket-place'])->name('basket-place');


//maršrutas susiejamas su GET užklausa į '/welcome' kelią ir grąžina 'welcome' rodinį.
Route::get('/welcome', function () {
    return view('welcome');
});
