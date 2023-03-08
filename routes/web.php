<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/categories', [MainController::class, 'categories'])->name('categories');

Route::get('/basket', [BasketController::class, 'basket'])->name('basket');
Route::get('/basket/place',[BasketController::class, 'basketPlace'])->name('basket-place');
Route::post('/basket/add/{id}',[BasketController::class, 'basketAdd'])->name('basket-add');
Route::post('/basket/remove/{id}',[BasketController::class, 'basketRemove'])->name('basket-remove');
Route::post('/basket/place/{id}',[BasketController::class, 'basketConfirm'])->name('basket-confirm');



Route::get('/{category}', [MainController::class, 'category'])->name('category');
Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');

require __DIR__.'/auth.php';
