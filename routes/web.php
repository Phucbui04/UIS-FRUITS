<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\AdminCategoryController;
use App\Http\Controllers\Admins\AdminProductController;
use App\Http\Controllers\Admins\AdminUserController;
use App\Http\Controllers\Admins\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\ZaloController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.detail');



// Hiển thị giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');



    
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

//User
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


//ADmin
Route::prefix('admin')->middleware('checkAdmin')->group(function () {   



    Route::get('/', DashboardController::class);
    Route::resource('products', AdminProductController::class)->names([
        'index' => 'admin.products.index',
        'create' => 'admin.products.create',
        'store' => 'admin.products.store',
        'show' => 'admin.products.show',
        'edit' => 'admin.products.edit',
        'update' => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
    ]);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('users', AdminUserController::class);

});
Route::prefix('zaloApi')->group(function () {
    Route::get('/products', [ZaloController::class, 'index'])->name('product.index');
    Route::get('/products/{id}', [ZaloController::class, 'detail'])->name('product.detail');
    Route::get('/cart', [ZaloController::class, 'cart'])->name('cart.index');
    Route::get('/checkout', [ZaloController::class, 'checkout'])->name('checkout.index');
});