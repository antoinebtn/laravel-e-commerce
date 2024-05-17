<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/filter', [ProductController::class, 'filter'])->name('products.filter');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/removeAll', [CartController::class, 'removeAll'])->name('cart.remove.all');

    Route::get('/order/index', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/orders-history', [ProfileController::class, 'showOrders'])->name('profile.orders');
    Route::prefix('admin')->group(function(){
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/products', [ProductController::class, 'adminIndex'])->name('admin.product.index');
        Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::delete('/product/{id}/delete', [ProductController::class, 'delete'])->name('admin.product.delete');
    });
});
    




//     Route::any('/contact/send', [HomeController::class, 'postContact'])->name('home.contact_us.send'); // Envoie un message de contact

//     Route::post('/cart/checkCoupon', [CartController::class, 'checkCoupon'])->name('cart.checkCoupon'); // Vérifie un coupon
//     Route::get('/cart/removeCoupon', [CartController::class, 'removeCoupon'])->name('cart.removeCoupon'); // Retire un coupon


//     Route::post('/checkout-validate', [CheckoutController::class, 'checkoutValidate'])->name('checkout.validate'); // Validation du panier
 