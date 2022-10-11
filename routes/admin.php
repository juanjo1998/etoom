<?php

use App\Http\Livewire\Admin\MyPost;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\ShowCategory;
use App\Http\Livewire\Admin\ShowProducts;
use App\Http\Livewire\Admin\CreateProduct;

use App\Http\Livewire\Admin\BrandComponent;

use App\Http\Livewire\Admin\ShowDepartment;
use App\Http\Livewire\Admin\ExampleComponent;
Use App\Http\Livewire\Admin\CityComponent;

use App\Http\Controllers\Admin\TestController;
use App\Http\Livewire\Admin\CreatePremiumImage;
use App\Http\Livewire\Admin\DepartmentComponent;
use App\Http\Controllers\Admin\PremiumController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdvertisingController;

Route::get('/', ShowProducts::class)->name('admin.index');

Route::get('posts', MyPost::class)->name('admin.posts.index');

Route::get('products/create', CreateProduct::class)->name('admin.products.create');
Route::get('products/{product}/edit', EditProduct::class)->name('admin.products.edit');
Route::post('products/{product}/files', [ProductController::class, 'files'])->name('admin.products.files');

Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('categories/{category}', ShowCategory::class)->name('admin.categories.show');
/* 
Route::get('brands', BrandComponent::class)->name('admin.brands.index'); */

Route::get('departments', DepartmentComponent::class)->name('admin.departments.index');
Route::get('departments/{department}', ShowDepartment::class)->name('admin.departments.show');

Route::get('cities/{city}', CityComponent::class)->name('admin.cities.show');

Route::get('test/{order}',[TestController::class,'test'])->name('admin.test');

/* premium */

Route::get('premium',[PremiumController::class,'index'])->name('admin.premium.index');
Route::get('premium/edit/{premiumImage}',[PremiumController::class,'edit'])->name('admin.premium.edit');
Route::get('premium/create',[PremiumController::class,'create'])->name('admin.premium.create');
Route::post('premium/store',[PremiumController::class,'store'])->name('admin.premium.store');
Route::post('premium/update/{premiumImage}',[PremiumController::class,'update'])->name('admin.premium.update');
Route::post('premium/delete/{premiumImage}',[PremiumController::class,'delete'])->name('admin.premium.delete');

/* advertising */
Route::get('/advertising/index',[AdvertisingController::class,'index'])->name('admin.advertising.index');
Route::get('/advertising/create',[AdvertisingController::class,'create'])->name('admin.advertising.create');
Route::post('/advertising/store',[AdvertisingController::class,'store'])->name('admin.advertising.store');
Route::get('/advertising/{premiumTestImage}/edit',[AdvertisingController::class,'edit'])->name('admin.advertising.edit');
Route::post('/advertising/{premiumTestImage}/update',[AdvertisingController::class,'update'])->name('admin.advertising.update');
Route::post('/advertising/{premiumTestImage}/delete',[AdvertisingController::class,'delete'])->name('admin.advertising.delete');


Route::get('/example',ExampleComponent::class)->name('example');
Route::get('/pago',function(){
    return 'Renueva tu suscripcion';
})->name('admin.pago');




