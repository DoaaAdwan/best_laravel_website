<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\ProductController;


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/featured_product', [App\Http\Controllers\HomeController::class, 'featuredProduct'])->name('featuredProduct');

Route::get('/',[PagesController::class,'index'])->name('index');

//user or customer routes
Route::prefix('/store')->name('store.')->group(function(){



    Route::get('/about',[PagesController::class,'about'])->name('about');
    Route::get('/contact',[PagesController::class,'contact'])->name('contact');
    Route::post('/send_message',[PagesController::class,'sendMessage'])->name('send');
    Route::get('/order/orders',[OrderController::class,'getOrders'])->name('myOrders')->middleware('auth');
    Route::get('/order/create/{slug}',[OrderController::class,'create'])->name('create')->middleware('auth');
    Route::post('/order/{slug}',[OrderController::class,'store'])->name('order.store')->middleware('auth');
    Route::get('/order/edit/{slug}',[OrderController::class,'edit'])->name('edit')->middleware('auth');
    Route::post('/order/edit/{slug}',[OrderController::class,'update'])->name('order.update')->middleware('auth');
    Route::get('editOrder/{id}',[OrderController::class,'editOrder'])->name('editOrder')->middleware('auth');
    Route::post('editOrder/{id}',[OrderController::class,'updateOrder'])->name('updateOrder')->middleware('auth');
    Route::get('orderDetails/{id}',[OrderController::class,'orderDetails'])->name('orderDetails')->middleware('auth');
    Route::delete('destroyOrder/{id}',[OrderController::class,'destroy'])->name('orders.destroy')->middleware('auth');
    // Route::get('/myorders',[OrderController::class,'myOrder'])->name('myorder');
    Route::post('/order/{slug}',[OrderController::class,'store'])->name('save')->middleware('auth');
    // Route::get('/checkout',[PagesController::class,'checkout'])->name('checkout');
    Route::get('/services',[PagesController::class,'services'])->name('services');
    Route::get('/shop',[PagesController::class,'shop'])->name('shop');
    Route::get('/product/{slug}',[PagesController::class,'show'])->name('show');
    Route::get('/category/{id}',[PagesController::class,'showProducts'])->name('showProducts');
    Route::get('/user/{id}',[PagesController::class,'editUser'])->name('editUser')->middleware('auth');
    Route::post('/user/{id}',[PagesController::class,'updateUser'])->name('updateUser')->middleware('auth');
    Route::get('/basiccategory/{category_id}',[PagesController::class,'basicCategory'])->name('basic');
    Route::get('/categories/{category_id}',[PagesController::class,'categories'])->name('categories');
    // Route::get('/wishlist',[PagesController::class,'wishlist'])->name('wishlist');
    Route::get('/myaccount',[PagesController::class,'myaccount'])->name('myaccount')->middleware('auth');
    Route::post('/search',[ProductController::class,'search'])->name('search');
    Route::get('/autocomplete',[ProductController::class,'autocomplete'])->name('autocomplete');


});



