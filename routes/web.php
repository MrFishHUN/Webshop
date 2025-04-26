<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\DisplayProductsController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
Route::get('/', [DisplayProductsController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



#ADMIN
    Route::resource('/admin/products/categories', CategoryController::class);
    Route::post('/admin/products/categories/search/', [CategoryController::class, 'search'])->name('categories.search');

    Route::get('/admin/products/products/search', [ProductController::class, 'search'])->name('products.search');
    Route::resource('/admin/products/products', ProductController::class);

Route::get('/admin/products/discounts/search', [DiscountController::class, 'search'])->name('discount.search');
    Route::resource('admin/products/discounts', DiscountController::class);
    Route::resource('/admin/products/coupons', CouponController::class);
#ADMIN END
