<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\OrdersCreate;
use App\Http\Livewire\ShoppingCart;
use App\Http\Livewire\ShoppingCartMovil;
use Gloudemans\Shoppingcart\Facades\Cart;

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

Route::get('/', WelcomeController::class)->name('index');

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');



Route::get('products/{product}',[ProductsController::class, 'show'])->name('products.show');


Route::get('search', SearchController::class)->name('search');

Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');
Route::get('m-shopping-cart', ShoppingCartMovil::class)->name('shopping-cart-movil');

Route::get('orders/create', OrdersCreate::class)->middleware('auth')->name('orders.create'); //middleware('auth') sirve para que solo gente autenticada acceda

Route::get('orders/{order}/payment', [OrderController::class, 'payment'])->middleware('auth')->name('orders.payment'); 

Route::get('orders/{order}',[OrderController::class, 'show'])->middleware('auth')->name('orders.show');

Route::get('orders', [OrderController::class, 'index'])->middleware('auth')->name('orders.index');