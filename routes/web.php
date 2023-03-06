<?php

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


//maršrutas susiejamas su GET užklausa į '/' kelią ir grąžina 'index' rodinį.
Route::get('/', function () {
    return view('index');
});
//maršrutas susiejamas su GET užklausa į '/categories' kelią ir grąžina 'categories' rodinį.
Route::get('/categories', function () {
    return view('categories');
});
//maršrutas susiejamas su GET užklausa į '/product' kelią ir grąžina 'product' rodinį.
Route::get('/product', function () {
    return view('product');
});
//maršrutas susiejamas su GET užklausa į '/welcome' kelią ir grąžina 'welcome' rodinį.
Route::get('/welcome', function () {
    return view('welcome');
});
