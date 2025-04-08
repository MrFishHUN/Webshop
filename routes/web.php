<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DisplayProductsController;
use Illuminate\Support\Facades\Route;
Route::get('/', [DisplayProductsController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


#USER
    // Route::get('/user' , function() {
    //     return view('user.userData.index');
    // })->name('userData') ;

    // Route::get('/user' , function() {
    //     return view('user.userOrder.index');
    // })->name('userOrder') ;

    // Route::get('/user' , function() {
    //     return view('user.userGuarantee.index');
    // })->name('userGuarantee') ;

    // Route::get('/user' , function() {
    //     return view('user.userBillingAddress.index');
    // })->name('userBillingAddress') ;

    Route::get('/user' , function() {
        return view('user.userReview.index');
    })->name('userReview') ;
#USER END



#ADMIN
    Route::get('/admin/products/categories', [CategoryController::class, 'index'])->name('admin.products.categories');
#ADMIN END
