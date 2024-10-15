<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\AdminCategoryController;
use App\Http\Controllers\Admins\AdminProductController;
use App\Http\Controllers\Admins\AdminUserController;
use App\Http\Controllers\Admins\DashboardController;
use App\Http\Controllers\Admins\DiscountController;
use App\Http\Controllers\Admins\AdminOrderController;
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
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');


    
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.process');
Route::post('/checkout/complete', [CheckoutController::class, 'completeCheckout'])->name('checkout.complete');
Route::get('/checkout/success', [CheckoutController::class, 'completeCheckout'])->name('checkout.success');
Route::get('/confirmOrder/{token}',[CheckoutController::class, 'confirmOrder'])->name('confirm.order');

//User
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');



//ADmin
Route::prefix('admin')->middleware('checkAdmin')->group(function () {   

    Route::get('/', DashboardController::class)->name('admin.dashboard.index');
    Route::prefix('dashboard')->middleware('checkAdmin')->group(function () {
      
        Route::get('/get-users', [DashboardController::class, 'getUser'])->name('admin.dashboard.getUser');
    });


    Route::resource('products', AdminProductController::class)->names([
        'index' => 'admin.products.index',
        'create' => 'admin.products.create',
        'store' => 'admin.products.store',
        'show' => 'admin.products.show',
        'edit' => 'admin.products.edit',
        'update' => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
    ]);
    Route::resource('categories', AdminCategoryController::class)->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'show' => 'admin.categories.show',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
    ]);
    Route::resource('users', AdminUserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);
    Route::resource('discount',DiscountController::class)->names([
        'index' => 'admin.discount.index',
        'create' => 'admin.discount.create',
        'store' => 'admin.discount.store',
        'show' => 'admin.discount.show',
        'edit' => 'admin.discount.edit',
        'update' => 'admin.discount.update',
        'destroy' => 'admin.discount.destroy',
    ]);
    Route::resource('order', AdminOrderController::class)->names([
        'index' => 'admin.orders.index',
        'show' => 'admin.orders.details',
        'create' => 'admin.orders.create',
        'store' => 'admin.orders.store',
        'show' => 'admin.orders.show',
        'edit' => 'admin.orders.edit',
        'update' => 'admin.orders.update',
        'destroy' => 'admin.orders.destroy',
    ]);
});
Route::prefix('zaloApi')->group(function () {
    Route::get('api/products', [ZaloController::class, 'index'])->name('zalo.product.index');
    Route::get('api/categories', [ZaloController::class, 'categories'])->name('zalo.cart.index');
    Route::get('api/checkout', [ZaloController::class, 'checkout'])->name('zalo.checkout.index');
    Route::get('api/productsByCategory', [ZaloController::class, 'productsByCategory'])->name('zalo.productsByCategory.index');
});