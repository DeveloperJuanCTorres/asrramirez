<?php

use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::get('/product/{product}', [App\Http\Controllers\HomeController::class, 'detail'])->name('product.detail');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/checkout', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');
Route::get('/buscar', [App\Http\Controllers\HomeController::class, 'buscar'])->name('buscar');
Route::get('/libro-reclamaciones', [App\Http\Controllers\HomeController::class, 'reclamaciones'])->name('libro-reclamaciones');

Route::get('/apibrand', [App\Http\Controllers\HomeController::class, 'apiBrand'])->name('apibrand');
Route::get('/apicategory', [App\Http\Controllers\HomeController::class, 'apiCategory'])->name('apicategory');
Route::get('/apiproduct', [App\Http\Controllers\HomeController::class, 'apiProduct'])->name('apiproduct');

Route::post('add', [App\Http\Controllers\CartController::class, 'add'])->name('add');
Route::get('cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart');
Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::get('cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('clear');
Route::post('cart/removeitem', [App\Http\Controllers\CartController::class, 'removeItem'])->name('removeitem');

Route::post('/enviar_pedido', [App\Http\Controllers\HomeController::class, 'pedido'])->name('enviar_pedido');
