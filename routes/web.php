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
Route::get('/', [MainController::class, 'index']);

//maršrutas nurodo, kad kai vartotojas eina į "categories" puslapį, Laravel turės vėl naudoti "MainController" klasę,
// bet šį kartą naudodamas "categories" funkciją, kad sugeneruotų puslapio turinį. Ši funkcija gali atlikti tam
// tikrus veiksmus, pvz., gauti kategorijas iš duomenų bazės ir atvaizduoti jas vartotojui.
Route::get('categories', [MainController::class, 'categories']);

//kelio maršrutas nurodo, kad kai vartotojas eina į "product" puslapį, Laravel turės vėl naudoti "MainController" klasę,
// bet šį kartą naudodamas "product" funkciją, kad sugeneruotų puslapio turinį. Ši funkcija gali atlikti tam tikrus
// veiksmus, pvz., gauti informaciją apie produktą iš duomenų bazės ir atvaizduoti ją vartotojui.
Route::get('product', [MainController::class, 'product']);
// '/', 'categories', 'product' kelio maršrutai turi būti apibrėžti aplikacijos maršrutų (routes) failo viduje,
// kad Laravel galėtų juos naudoti, kai vartotojas atlieka atitinkamą veiksmą, pvz., kai paspaudžia nuorodą arba įveda adresą į naršyklės adresų juostą.


//maršrutas susiejamas su GET užklausa į '/welcome' kelią ir grąžina 'welcome' rodinį.
Route::get('/welcome', function () {
    return view('welcome');
});
