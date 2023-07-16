<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CartController;

use App\Http\Controllers\Frontend\OrderController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/redirect', [HomeController::class, 'redirect']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Category Controller Route Section
Route::get('/category', [CategoryController::class, 'index'])->name('category.index')->middleware(['auth']);
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create')->middleware(['auth']);
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store')->middleware(['auth']);
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit')->middleware(['auth']);
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update')->middleware(['auth']);
Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy')->middleware(['auth']);

// Product Controller Route Section
Route::get('/all/products', [ProductController::class, 'index'])->name('product.index')->middleware(['auth']);
Route::get('/create/product', [ProductController::class, 'create'])->name('product.create')->middleware(['auth']);
Route::post('/store/product', [ProductController::class, 'store'])->name('product.store')->middleware(['auth']);
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit')->middleware(['auth']);
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update')->middleware(['auth']);
Route::get('/create/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware(['auth']);

// Cart Controller Route Section
Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware(['auth']);





// Frontend Product Details Route||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
Route::get('/product/destdetails/{id}', [HomeController::class, 'details'])->name('product.details');
// Add to cart Product  Route
Route::post('/add/cart/{id}', [HomeController::class, 'add_cart'])->name('add.cart');
// Add to cart View  Route
Route::get('/cart/view', [HomeController::class, 'cart_view'])->name('cart.view');
// Add to cart cancel Order  Route
Route::get('/order/cancel/{id}', [HomeController::class, 'order_cancel'])->name('order.cancel');

// Cash On Delivery Order  Route
Route::get('/confirm/order', [OrderController::class, 'order_info'])->name('confirm.order');
Route::post('/confirm/order/added', [OrderController::class, 'order_store'])->name('confirm_order.store')->middleware(['auth']);

// Pay Using Card  Route
Route::get('/stripe/{total_price}', [OrderController::class, 'stripe'])->name('strip.order')->middleware(['auth']);
Route::post('stripe/{total_price}', [OrderController::class, 'stripePost'])->name('stripe.post')->middleware(['auth']);







require __DIR__ . '/auth.php';
