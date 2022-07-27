<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingFeeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\CityController; 
use App\Http\Controllers\CartController; 
use App\Http\Controllers\WishlistController; 
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

/*
 *
 *
========================= Website ==============================
 *
 *
*/
Auth::routes();

Route::get('/', [HomeController::class, 'index']);

Route::get('the-loai-{id}', [HomeController::class, 'categoryPage']);
Route::get('chi-tiet-sach-{id}', [HomeController::class, 'productDetailsPage']);

Route::get('tac-gia-{id}', [HomeController::class, 'authorDetailsPage']);
// Route::get('chi-tiet-tac-gia-{id}', [HomeController::class, 'authorDetailsPage']);

Route::get('cities', [CityController::class, 'index'])->name('cities.index');
Route::post('addCart', [CartController::class, 'save_cart'])->name('addCart');
Route::post('add-wishlist', [WishlistController::class, 'save_wishlist'])->name('addWish');
/*
 *
 *
========================= Sign-in, Sign-up ==============================
 *
 *
*/

Route::get('sign-in', function () {
    return view('sign-in');
});

Route::get('sign-up', function () {
    return view('sign-up');
});



/*
 *
 *
=========================Admin Website ==============================
 *
 *
*/


Route::prefix('admin')->group(function () {

    Route::get('/',  [App\Http\Controllers\Admin\HomeController::class, 'index']);
  

    // category 
    Route::prefix('category')->group(function () {

        Route::get('list', [CategoryController::class, 'index']);
        Route::get('disable_status/{id}', [CategoryController::class, 'disable_status']);
        Route::get('enable_status/{id}', [CategoryController::class, 'enable_status']);

        Route::get('create', function () {
            return view('BE.category.create');
        });
        Route::get('update/{id}', [CategoryController::class, 'edit']);

	    Route::post('/create', [CategoryController::class, 'create']);
        Route::post('/update/{id}', [CategoryController::class, 'update']);
        Route::get('/delete/{id}', [CategoryController::class, 'delete']);

        
        Route::get('edit', function () {
            return view('BE.category.edit');
        });
    });

     // sub category 
     Route::prefix('sub-category')->group(function () {

        Route::get('/list', [SubCategoryController::class, 'index']);
        Route::get('/disable_status/{id}', [SubCategoryController::class, 'disable_status']);
        Route::get('/enable_status/{id}', [SubCategoryController::class, 'enable_status']);

        Route::get('/create', [SubCategoryController::class, 'view_create']);
        Route::get('/update/{id}', [SubCategoryController::class, 'edit']);

	    Route::post('/create', [SubCategoryController::class, 'create']);
        Route::post('/update/{id}', [SubCategoryController::class, 'update']);

        
        Route::get('/edit', [SubCategoryController::class, 'view_update']);
        Route::get('/delete/{id}', [SubCategoryController::class, 'delete']);

    });

     // sub category 
     Route::prefix('publisher')->group(function () {

        Route::get('/list', [PublisherController::class, 'index']);
        Route::get('/disable_status/{id}', [PublisherController::class, 'disable_status']);
        Route::get('/enable_status/{id}', [PublisherController::class, 'enable_status']);

        Route::get('/create', [PublisherController::class, 'view_create']);
        Route::get('/update/{id}', [PublisherController::class, 'edit']);

	    Route::post('/create', [PublisherController::class, 'create']);
        Route::post('/update/{id}', [PublisherController::class, 'update']);

        
        Route::get('/edit', [PublisherController::class, 'view_update']);
        Route::get('/delete/{id}', [PublisherController::class, 'delete']);

    });

     // sub category 
     Route::prefix('author')->group(function () {

        Route::get('/list', [AuthorController::class, 'index']);
        Route::get('/disable_status/{id}', [AuthorController::class, 'disable_status']);
        Route::get('/enable_status/{id}', [AuthorController::class, 'enable_status']);

        Route::get('/create', [AuthorController::class, 'view_create']);
        Route::get('/update/{id}', [AuthorController::class, 'edit']);

	    Route::post('/create', [AuthorController::class, 'create']);
        Route::post('/update/{id}', [AuthorController::class, 'update']);

        
        Route::get('/edit', [AuthorController::class, 'view_update']);
        Route::get('/delete/{id}', [AuthorController::class, 'delete']);

    });

    Route::prefix('size')->group(function () {

        Route::get('/list', [SizeController::class, 'index']);
        Route::get('/disable_status/{id}', [SizeController::class, 'disable_status']);
        Route::get('/enable_status/{id}', [SizeController::class, 'enable_status']);

        Route::get('/create', [SizeController::class, 'view_create']);
        Route::get('/update/{id}', [SizeController::class, 'edit']);

	    Route::post('/create', [SizeController::class, 'create']);
        Route::post('/update/{id}', [SizeController::class, 'update']);

        
        Route::get('/edit', [SizeController::class, 'view_update']);
        Route::get('/delete/{id}', [SizeController::class, 'delete']);

    });

    Route::prefix('discount')->group(function () {

        Route::get('/list', [DiscountController::class, 'index']);
        Route::get('/disable_status/{id}', [DiscountController::class, 'disable_status']);
        Route::get('/enable_status/{id}', [DiscountController::class, 'enable_status']);

        Route::get('/create', [DiscountController::class, 'view_create']);
        Route::get('/update/{id}', [DiscountController::class, 'edit']);

	    Route::post('/create', [DiscountController::class, 'create']);
        Route::post('/update/{id}', [DiscountController::class, 'update']);

        
        Route::get('/edit', [DiscountController::class, 'view_update']);
        Route::get('/delete/{id}', [DiscountController::class, 'delete']);

    });




    // product
    Route::prefix('product')->group(function () {
        Route::get('/list', [ProductController::class, 'index']);
        Route::get('/disable_status/{id}', [ProductController::class, 'disable_status']);
        Route::get('/enable_status/{id}', [ProductController::class, 'enable_status']);

        Route::get('/create', [ProductController::class, 'view_create']);
        Route::get('/update/{id}', [ProductController::class, 'edit']);

	    Route::post('/create', [ProductController::class, 'create']);
        Route::post('/update/{id}', [ProductController::class, 'update']);

        
        // Route::get('/edit', [ProductController::class, 'view_update']);
        Route::get('/delete/{id}', [ProductController::class, 'delete']);

    });

    Route::prefix('shipping-fee')->group(function () {
        Route::get('/list', [ShippingFeeController::class, 'index']);
        // Route::get('/disable_status/{id}', [ShippingFeeController::class, 'disable_status']);
        // Route::get('/enable_status/{id}', [ShippingFeeController::class, 'enable_status']);

        Route::get('/create', [ShippingFeeController::class, 'view_create']);
        // Route::get('/update/{id}', [ShippingFeeController::class, 'edit']);

	    Route::post('/create', [ShippingFeeController::class, 'create']);
        // Route::post('/update/{id}', [ShippingFeeController::class, 'update']);

        
        // // Route::get('/edit', [ProductController::class, 'view_update']);
        Route::get('/delete/{id}', [ShippingFeeController::class, 'delete']);

    });

    Route::prefix('banner')->group(function () {
        Route::get('/list', [BannerController::class, 'index']);
        Route::get('/disable_status/{id}', [BannerController::class, 'disable_status']);
        Route::get('/enable_status/{id}', [BannerController::class, 'enable_status']);

        Route::get('/create', [BannerController::class, 'view_create']);
        Route::get('/update/{id}', [BannerController::class, 'edit']);

	    Route::post('/create', [BannerController::class, 'create']);
        Route::post('/update/{id}', [BannerController::class, 'update']);

        
        // Route::get('/edit', [ProductController::class, 'view_update']);
        Route::get('/delete/{id}', [BannerController::class, 'delete']);

    });
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
