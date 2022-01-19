<?php

use Illuminate\Support\Facades\Route;

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


//Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/')->group(function () {
    Route::get('Home', function () {
        return view('user.home.index');
    })->name("home");

    Route::get('shop', function () {
        return view('user.home.shop');
    })-> name("shop");

    Route::get('news', function () {
        return view('user.news.index');
    })-> name("news");

    Route::get('single-product', function () {
        return view('user.home.single-product');
    })-> name("single-product");

    Route::get('cart', function () {
        return view('user.cart.index');
    })-> name("cart");

    Route::get('checkout', function () {
        return view('user.checkout.index');
    })->name("checkout");
});

?>
