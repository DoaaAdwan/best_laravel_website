<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PostController;

// use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BannersController;
// use App\Http\Controllers\Admin\ProductCategory;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\ShowOrdersController;
use App\Http\Controllers\Admin\HomeCategoryController;
use App\Http\Controllers\OrderController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth', 'admin')->name('admin.')->group(function(){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    //posts routes
    Route::resource('posts', PostController::class);

    // Route::resource('categories', CategoryController::class);

    //products routes
    Route::get('/show',[ShowOrdersController::class,'index'])->name('show');
    Route::get('/orderDetails/{id}',[ShowOrdersController::class,'orderDetails'])->name('orderDetails');
    Route::post('/orderDetails/{id}',[ShowOrdersController::class,'updateOrderStatus'])->name('update');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('home_sliders', HomeSliderController::class);
    Route::resource('home_categories', HomeCategoryController::class);
    Route::get('/markAsRead', function(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('markRead');


    // Route::get('/home_categories',HomeCategoryController::class,'index')->name('homecategories');

    // Route::resource('tags', PostController::class);
});
