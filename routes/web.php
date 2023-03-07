<?php

use App\Http\Controllers\BasketController;
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

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/categories', [MainController::class, 'categories'])->name('categories');

Route::get('/basket', [BasketController::class, 'basket'])->name('basket');
Route::get('/basket/place',[BasketController::class, 'basketPlace'])->name('basket-place');
Route::post('/basket/add/{id}',[BasketController::class, 'basketAdd'])->name('basket-add');
Route::post('/basket/remove/{id}',[BasketController::class, 'basketRemove'])->name('basket-remove');
Route::post('/basket/place/{id}',[BasketController::class, 'basketConfirm'])->name('basket-confirm');



Route::get('/{category}', [MainController::class, 'category'])->name('category');
Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/order', function () {
    return view('order');
});
