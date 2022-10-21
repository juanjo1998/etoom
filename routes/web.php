<?php

use App\Http\Livewire\ShoppingCart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
Use App\Http\Controllers\SearchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdvertisingController;
use App\Http\Controllers\WeatherController;
use App\Http\Livewire\Weather;

Route::get('/', HomeController::class)->name('home');
Route::get('search', SearchController::class)->name('search');
Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

//Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');  pendiente para ghacer

/* advertising */

Route::get('/advertising/index',[AdvertisingController::class,'index'])->name('advertising.index');

/* weather */

Route::get('weather',Weather::class)->name('weather');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




    

