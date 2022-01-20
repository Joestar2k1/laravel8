<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\InvoiceController;
use Illuminate\Support\Facades\Auth;
Route::group(['prefix' => '/'], function () {
    Route::get('login', [LoginController::class,'loginForm'])->name('admin.login.get');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login.post');
    Route::get('logout', [LoginController::class, 'logout'])->
    name('admin.logout');  
    
    Route::group(['middleware' => ['auth:admin']], function () {
       Route::get('/dashboard', [HomeController::class,'index'])->name('admin.dashboard');

       Route::get('/account', [AccountController::class, 'loadAccount'])->
       name('admin.account');

       Route::get('/account/delete/{id}', [AccountController::class, 'deleteAccount'])->
       name('admin.account.delete');

       Route::get('/account/search', [AccountController::class, 'Search'])->
       name('admin.account.search');

       Route::get('/account/profile', [AccountController::class, 'viewProfile'])->
       name('admin.account.profile');

       //--------------------------------------------------------------->

       Route::group(['prefix' => '/products'], function () {
        
            Route::get('', [ProductController::class, 'loadProduct'])->
            name('admin.product');

            Route::get('/request/{request1}', [ProductController::class, 'handleRequestSwap'])->
            name('admin.product.request');

            Route::get('/search', [ProductController::class, 'Search'])->
            name('admin.product.search');

            Route::get('/create', [ProductController::class, 'viewCreate'])->
            name('admin.product.create.index');

            Route::post('/create', [ProductController::class, 'createProduct'])->
            name('admin.product.create');

            Route::get('/delete/{id}', [ProductController::class, 'deleteProduct'])->
            name('admin.product.delete');
       });

       Route::group(['prefix' => '/invoices'], function () {
        Route::get('/', [InvoiceController::class, 'showInvoice'])->
        name('admin.invoices');
        // Route::get('/create', [ProductController::class, 'viewCreate'])->
        // name('admin.product.create.index');
        // Route::post('/create', [ProductController::class, 'createProduct'])->
        // name('admin.product.create');
        // Route::get('/delete/{id}', [ProductController::class, 'deleteProduct'])->
        // name('admin.product.delete');
        });
    });
  
});

