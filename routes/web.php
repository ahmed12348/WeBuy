<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoesController;
use App\Http\Controllers\SearchController;
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


//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

//route::get('men_shoes',[ShoesController::class, 'men_shoes_index'])->name('men_shoes');
//route::get('show_shoes/{id}',[ShoesController::class, 'men_shoes'])->name('men_shoes_view');
//
//route::get('women_shoes',[ShoesController::class, 'women_shoes_index'])->name('women_shoes');
//route::get('women_shoes/{id}',[ShoesController::class, 'women_shoes'])->name('women_shoes_view');
//
//route::get('kids_shoes',[ShoesController::class, 'kids_shoes_index'])->name('kids_shoes');
//route::get('kids_shoes/{id}',[ShoesController::class, 'kids_shoes'])->name('kids_shoes_view');

Route::get('search', [SearchController::class, 'index'])->name('search');
Route::get('autocomplete', [SearchController::class, 'autocomplete'])->name('autocomplete');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//    Route::resource('/', HomeController::class);
});

Route::get('/m', [ProductController::class, 'index']);
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
