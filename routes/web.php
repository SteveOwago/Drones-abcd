<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\AccountController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\SearchController;
use Illuminate\Support\Facades\Auth;

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

Route::view('/', 'site.pages.homepage');
Route::get('/', [HomeController::class, 'index'])->name('homepage');

require 'admin.php';
Auth::routes();

Route::group(['prefix'  =>   'site', 'middleware' => ['auth']], function () {
    Route::get('/checkout', [CheckoutController::class, 'getCheckout'])->name('checkout.index');
    Route::get('/mpesa', [CheckoutController::class, 'getMpesaCheckout'])->name('checkout.mpesa');
    Route::post('/checkout/order', [CheckoutController::class, 'placeOrder'])->name('checkout.place.order');

    Route::get('checkout/payment/complete', [CheckoutController::class, 'complete'])->name('checkout.payment.complete');
    Route::get('account/orders', [AccountController::class, 'getOrders'])->name('account.orders');
    Route::get('/{order}/order', [AccountController::class, 'show'])->name('account.order');
    Route::get('account/profile/{id}', [AccountController::class, 'getProfile'])->name('account.profile');
});

Route::group(['prefix'  =>   'site'], function () {
    Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
    Route::post('/product/add/cart', [ProductController::class, 'addToCart'])->name('product.add.cart');
    Route::get('/cart', [CartController::class, 'getCart'])->name('checkout.cart');
    Route::get('/cart/item/{id}/remove', [CartController::class, 'removeItem'])->name('checkout.cart.remove');
    Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('checkout.cart.clear');
    Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/search/action', [SearchController::class, 'action'])->name('search.action');
    Route::get('/pages/result', [SearchController::class, 'result'])->name('site.pages.result');
    Route::get('/pages/resultnoData', [SearchController::class, 'resultnoData'])->name('site.pages.resultnoData');
});
Route::get('stripe', [StripePaymentController::class, 'stripe']);
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');




//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
