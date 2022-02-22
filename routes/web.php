<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\InvoiceController;
use App\Http\Controllers\User\BlogController;
use Illuminate\Support\Facades\Auth;


//Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/')->group(function () {
    //login
    Route::get('users/login',[LoginController::class,'loginForm'])->name("user.login");

    Route::post('users/login',[LoginController::class,'login'])->name("user.login.post");

    Route::get('users/logout',[LoginController::class,'logout'])->name("user.logout");

    Route::get('users/register',[LoginController::class,'registerForm'])->name("user.register");
    
    Route::post('users/register',[LoginController::class,'register'])->name("user.register.post");

    //home-shop-details
    Route::get('home',[HomeController::class,'index'])->name("user.home");
    // Route::get('/search', [ProductController::class, 'Search'])->name('admin.home.search');
    Route::get('home/shop',[HomeController::class,'shop'])->name("user.home.shop");
    Route::get('home/products/view-details/{id}',[ProductController::class,'ViewDetails'])->name("user.home.details");

    //profile
    Route::get('home/user/my-profile/order-management',[UserController::class,'orderManagement'])->name("user.order_management");
    Route::get('home/user/my-profile/account-management',[UserController::class,'accountManagement'])->name("user.account_management");
    Route::post('home/user/my-profile/account-management',[UserController::class,'editUser'])->name("user.edit_account");

    //cart
    Route::get('home/cart',[CartController::class,'showCart'])->name("user.cart");
    Route::get('home/addToCart/{id}',[CartController::class,'addToCart'])->name("user.addToCart");
    Route::get('home/cart/checkout',[CartController::class,'checkout'])->name("user.checkout");
    Route::get('home/cart/delete-cart/{id}',[CartController::class,'deleteCart'])->name("user.delete-cart");
    //invoice

    Route::post('home/cart/checkout',[InvoiceController::class,'createInvoice'])->name("user.create-invoice.post");

    Route::get('home/blogs/',[BlogController::class,'index'])->name("user.blogs");
    Route::get('home/blogs/view-details/{id}',[BlogController::class,'viewDetails'])->name("user.blogs.single");
});

?>