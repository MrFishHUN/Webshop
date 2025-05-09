<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\DisplayElectronicDevicesController;
use App\Http\Controllers\DisplayGamesController;
use App\Http\Controllers\DisplayPartsController;
use App\Http\Controllers\DisplayProductsController;
use App\Http\Controllers\DisplayTelevisionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', [DisplayProductsController::class, 'index'])->name('home');
Route::get('/product/{slug}', [ProductController::class, 'display'])->name('displayProduct');

Route::get('/products', [SearchController::class, 'index'])->name('displayProducts.search');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/addItem', [CartController::class, 'addItem'])->name('addItem');

#USER
    Route::get('/user' , function() {
        return view('user.userData.index');
    })->name('userData') ;

    Route::get('/userOrder' , function() {
        return view('user.userOrder.index');
    })->name('userOrder') ;

    Route::get('/user/userAddress' , function() {
        return view('user.userAddress.index');
    })->name('userAddress') ;

    Route::get('/editData' , function() {
        return view('user.editData.index');
    })->name('editData') ;

    Route::get('/editAddress' , function() {
        return view('user.editAddress.index');
    })->name('editAddress') ;

    Route::get('/cart' , function() {
        if (Auth::check()) {
            return view('user.cart.index');
        }
        return redirect('login');
    })->name('cart') ;

    Route::get('/checkout' , function() {
        return view('user.checkout.index');
    })->name('checkout') ;
#USER END

#ADMIN
    Route::resource('/admin/products/categories', CategoryController::class);
    Route::post('/admin/products/categories/search/', [CategoryController::class, 'search'])->name('categories.search');

    Route::get('/admin/products/products/search', [ProductController::class, 'search'])->name('products.search');
    Route::resource('/admin/products/products', ProductController::class);

Route::get('/admin/products/discounts/search', [DiscountController::class, 'search'])->name('discount.search');
    Route::resource('admin/products/discounts', DiscountController::class);
    Route::resource('/admin/products/coupons', CouponController::class);

    //users
Route::put('admin/users/users/restore/{user}', [UserController::class, 'restore'])->name('users.restore');
Route::delete('admin/users/users/forcedelete/{user}', [UserController::class, 'forceDelete'])->name('users.forceDelete');
Route::post('admin/users/users/newPassword/{user}', [UserController::class, 'newPassword'])->name('users.sendPasswordResetEmail');
Route::get('admin/users/users', [UserController::class, 'index'])->name('users.index');
Route::delete('admin/users/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('admin/users/users/search', [UserController::class, 'search'])->name('users.search');
Route::get('admin/users/users/{user}/edit', [UserController::class, 'editEmail'])->name('users.editEmail');
Route::put('admin/users/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('admin/users/users/trashed', [UserController::class, 'trashed'])->name('users.trashed');

//cart
Route::resource('/admin/orders/carts', CartController::class);

Route::post('/admin/orders/orders/store', [OrderController::class, 'store'])->name('orders.store');
#ADMIN END
