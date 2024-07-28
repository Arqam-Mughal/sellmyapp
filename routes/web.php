<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontAuthController;
use App\Http\Controllers\AllProductsController;
use App\Http\Controllers\ProductDetailsController;
// use App\Http\Middleware\AdminRedirectIfAuthenticated;

// Route::middleware(['admin_guest'])->name('front.')->group(function(){

Route::name('front.')->group(function(){

Route::get('/register', [FrontAuthController::class, 'register'])->name('register');
Route::post('/registerStore', [FrontAuthController::class, 'registerStore'])->name('registerStore');
Route::get('/login', [FrontAuthController::class, 'login'])->name('login');
Route::post('/authenticate', [FrontAuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [FrontAuthController::class, 'logout'])->name('logout');



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/downloads/{slug}', [ProductDetailsController::class, 'details'])->name('product.details');
Route::get('/downloads', [AllProductsController::class, 'index'])->name('all-products');


// filter routes
Route::get('/downloads/category/{slug}', [AllProductsController::class, 'index'])->name('all-products.category');

Route::get('/downloads/{categorySlug?}/subcategory/{subcategorySlug?}', [AllProductsController::class, 'index'])->name('all-products.subcategory');

Route::get('/downloads/subcategory/{subcategorySlug?}', [AllProductsController::class, 'index'])->name('all-products.subcategory.default');


Route::get('/downloads/{categorySlug?}/{subcategorySlug?}/{subsubcategory?}', [AllProductsController::class, 'index'])->name('all-products.subcategory.subcategory');

Route::get('/downloads/{subcategory?}/{subsubcategory?}', [AllProductsController::class, 'index'])->name('all-products.subcategory.subcategory.default2');

Route::get('/downloads/subcategory/{subsubcategory?}', [AllProductsController::class, 'index'])->name('all-products.subcategory.subcategory.default');
// end-filter-routes

// Route::get('', [AllProductsController::class, 'index'])->name('game-template');

// addCart-routes
Route::post('/addCart', [CartController::class, 'addCart'])->name('product.cart');

Route::get('/checkout', [CartController::class, 'viewCheckout'])->name('cart.viewCheckout');
Route::delete('/cart/delete', [CartController::class, 'cartDelete'])->name('cart.delete');


});


Route::get('/sell_your_app', function(){
    return view('front.sell_your_app');
})->name('temp.sell-your-app');

Route::get('/help-support', function(){
    return view('front.help-support');
})->name('temp.support');

Route::get('/privacy-policy', function(){
    return view('front.privacy-policy');
})->name('temp.privacy-policy');

Route::get('/developer-terms&conditions', function(){
    return view('front.developer-terms&conditions');
})->name('temp.dev-term-conditions');

Route::get('/how-to-make-app', function(){
    return view('front.how-to-make-app');
})->name('temp.how-to-make-app');

Route::get('/limited-offers', function(){
    return view('front.limited-offers');
})->name('temp.limited-offers');

Route::get('/reskinned-express', function(){
    return view('front.reskinned-express');
})->name('temp.reskinned-express');

Route::get('/vendor-registration', function(){
    return view('front.vendor-registration');
})->name('temp.vendor-registration');

Route::get('/app-licence-type', function(){
    return view('front.app-licence-type');
})->name('temp.app-licence-type');

Route::get('/author', function(){
    return view('front.author');
})->name('temp.author');

Route::get('/blog', function(){
    return view('front.blog');
})->name('temp.blog');

Route::get('/buy-app-source-code', function(){
    return view('front.buy-app-source-code');
})->name('temp.buy-app-source');

Route::get('/buyer-terms&conditions', function(){
    return view('front.buyer-terms&conditions');
})->name('temp.buyer-terms&conditions');

Route::get('/category', function(){
    return view('front.category');
})->name('temp.category');

Route::get('/developers-beware-of-a-phising-email', function(){
    return view('front.developers-beware-of-a-phising-email-that-will-ask-you-to-reupload-your-files');
})->name('temp.dev-beware-of-phising-email');

Route::get('/first-winner', function(){
    return view('front.first-winner');
})->name('temp.first-winner');

Route::get('/preparing-your-code', function(){
    return view('front.preparing-your-code');
})->name('temp.preparing-your-code');



Route::get('/reskin-terms&conditions', function(){
    return view('front.reskin-terms&conditions');
})->name('temp.reskin-terms&conditions');

Route::get('/uploading-your-code', function(){
    return view('front.uploading-your-code');
})->name('temp.uploading-your-code');

Route::get('/user-terms&conditions', function(){
    return view('front.user-terms&conditions');
})->name('temp.user-terms&conditions');


Route::get('/app-templates', function(){
    return view('front.app-templates');
})->name('temp.app');


// admin-routes

require __DIR__.'/admin.php';
