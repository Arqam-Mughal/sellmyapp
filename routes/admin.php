<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PlatformController;
use App\Http\Controllers\Admin\TempTypeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TempImageController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\TempTypesRelatedToController;

Route::middleware(['admin_guest'])->controller(AdminLoginController::class)->prefix('admin')->name('admin.')->group(function(){

Route::get('/login', 'login')->name('login');
Route::post('/authenticate', 'authenticate')->name('authenticate');
// Route::get('/forgot-password', 'login')->name('forgot');

});

// Route::middleware(['admin_auth:admin,teacher'])->prefix('admin')->name('admin.')->group(function(){
Route::middleware(['admin_auth:admin'])->prefix('admin')->name('admin.')->group(function(){

  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

  //  platform-routes

  Route::get('/platform/create', [PlatformController::class, 'create'])->name('platform.create');
  Route::post('/platform/store', [PlatformController::class, 'store'])->name('platform.store');
  Route::get('/platform', [PlatformController::class, 'index'])->name('platform.index');
  Route::get('/platform/{id}/edit', [PlatformController::class, 'edit'])->name('platform.edit');
  Route::put('/platform/{id}', [PlatformController::class, 'update'])->name('platform.update');
  Route::delete('/platform/{id}', [PlatformController::class, 'destroy'])->name('platform.delete');

  //  template-types-routes

  Route::get('/temp-type/create', [TempTypeController::class, 'create'])->name('temp-type.create');
  Route::post('/temp-type/store', [TempTypeController::class, 'store'])->name('temp-type.store');
  Route::get('/temp-type', [TempTypeController::class, 'index'])->name('temp-type.index');
  Route::get('/temp-type/{id}/edit', [TempTypeController::class, 'edit'])->name('temp-type.edit');
  Route::put('/temp-type/{id}', [TempTypeController::class, 'update'])->name('temp-type.update');
  Route::delete('/temp-type/{id}', [TempTypeController::class, 'destroy'])->name('temp-type.delete');

   //  template-types-related-to-routes

   Route::get('/temp-type-related-to/create', [TempTypesRelatedToController::class, 'create'])->name('temp-type-related-to.create');
   Route::post('/temp-type-related-to/store', [TempTypesRelatedToController::class, 'store'])->name('temp-type-related-to.store');
   Route::get('/temp-type-related-to', [TempTypesRelatedToController::class, 'index'])->name('temp-type-related-to.index');
   Route::get('/temp-type-related-to/{id}/edit', [TempTypesRelatedToController::class, 'edit'])->name('temp-type-related-to.edit');
   Route::put('/temp-type-related-to/{id}', [TempTypesRelatedToController::class, 'update'])->name('temp-type-related-to.update');
   Route::delete('/temp-type-related-to/{id}', [TempTypesRelatedToController::class, 'destroy'])->name('temp-type-related-to.delete');

   //  product-routes

   Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
   Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
   Route::get('/product', [ProductController::class, 'index'])->name('product.index');
   Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
   Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
   Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.delete');

   Route::get('/product-category', [ProductController::class, 'productCategoryGet'])->name('product-category-get');
   Route::get('/product-subcategory', [ProductController::class, 'productSubCategoryGet'])->name('product-subcategory-get');

   // product-images-delete/update
   Route::post('/product-images/update', [ProductImageController::class, 'update'])->name('product-images.update');
    Route::delete('/product-images', [ProductImageController::class, 'destroy'])->name('product-images.delete');

    //  temp-image-routes

Route::post('/temp-images', [TempImageController::class, 'create'])->name('temp-images.create');

Route::get('/getFrameworks', [ProductController::class, 'getFrameworks'])->name('getFrameworks');




});

Route::get('/getSlug', function(Request $req){
  if(!empty($req->title)){
      $slug = Str::slug($req->title);
  }else{
    $slug = "";
  }

  return response()->json([
    'status' => true,
    'slug' => $slug
  ]);
})->name('getSlug');
