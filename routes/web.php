<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Person\OrderController as PersonOrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

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

require __DIR__ . '/auth.php';

//Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::group([
        'prefix' => 'person',
        'namespace' => 'Person',
        'as' => 'person.',
    ], function () {
        Route::get('/orders', [PersonOrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [PersonOrderController::class, 'show'])->name('orders.show');
    });
    Route::group([
//        'namespace' => 'Admin',
        'prefix' => 'admin',
    ], function () {
        Route::group(['middleware' => 'is_admin'], function () {
            Route::get('/orders', [AdminOrderController::class, 'index'])->name('home');
            Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
        });
        Route::resources([
            'categories' => CategoryController::class,
            'products' => ProductController::class
        ]);
    });
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/categories', [MainController::class, 'categories'])->name('categories');
    Route::get('/allproducts', [MainController::class, 'allProducts'])->name('allproducts');

    Route::group(['prefix' => 'basket'], function () {
        Route::post('/add/{product}', [BasketController::class, 'basketAdd'])->name('basket-add');

        Route::group([
            'middleware' => 'basket_not_empty',
        ], function () {
            Route::get('/', [BasketController::class, 'basket'])->name('basket');
            Route::get('/place', [BasketController::class, 'basketPlace'])->name('basket-place');
            Route::post('/remove/{product}', [BasketController::class, 'basketRemove'])->name('basket-remove');
            Route::post('/place', [BasketController::class, 'basketConfirm'])->name('basket-confirm');
        });
    });


    Route::get('/{category}', [MainController::class, 'category'])->name('category');
    Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');

