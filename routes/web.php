<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DisplayProductsController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
Route::get('/', [DisplayProductsController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


#PRODUCT
Route::get('/termekek/{id}', [ProductController::class, 'show'])->name('products.show');
#PRODUCT END

#USER
    Route::get('/user' , function() {
        return view('user.userData.index');
    })->name('userData') ;

    Route::get('/user/userOrder' , function() {
        return view('user.userOrder.index');
    })->name('userOrder') ;

    Route::get('/user/userGuarantee' , function() {
        return view('user.userGuarantee.index');
    })->name('userGuarantee') ;

    Route::get('/user/userBillingAddress' , function() {
        return view('user.userBillingAddress.index');
    })->name('userBillingAddress') ;

    Route::get('/user/userReview' , function() {
        return view('user.userReview.index');
    })->name('userReview') ;

    Route::get('/editData' , function() {
        return view('user.editData.index');
    })->name('editData') ;

    Route::get('/editOrder' , function() {
        return view('user.editOrder.index');
    })->name('editOrder') ;

    Route::get('/editBilling' , function() {
        return view('user.editBilling.index');
    })->name('editBilling') ;



    Route::get('parts' , function() {
        return view('category.parts.index');
    })->name('parts') ;

    Route::get('/games' , function() {
        return view('category.games.index');
    })->name('games') ;

    Route::get('/televison' , function() {
        return view('category.televison.index');
    })->name('televison') ;

    Route::get('/electronic-parts' , function() {
        return view('category.electronic-parts.index');
    })->name('electronic-parts') ;
#USER END

#ADMIN
    Route::get('/admin/products/categories', [CategoryController::class, 'index'])->name('admin.products.categories');
#ADMIN END
