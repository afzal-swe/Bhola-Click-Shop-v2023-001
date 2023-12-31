<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PdfController;
use App\Http\Controllers\Admin\SendMailController;
use App\Notifications\SendEmailNotification;

use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\invoiceController;

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

Route::get('/redirect', [HomeController::class, 'redirect'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Category Controller Route Section
Route::get('/category', [CategoryController::class, 'index'])->name('category.index')->middleware(['auth', 'verified']);
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create')->middleware(['auth', 'verified']);
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store')->middleware(['auth', 'verified']);
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit')->middleware(['auth', 'verified']);
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update')->middleware(['auth', 'verified']);
Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy')->middleware(['auth', 'verified']);

// Product Controller Route Section
Route::get('/all/products', [ProductController::class, 'index'])->name('product.index')->middleware(['auth', 'verified']);
Route::get('/create/product', [ProductController::class, 'create'])->name('product.create')->middleware(['auth', 'verified']);
Route::post('/store/product', [ProductController::class, 'store'])->name('product.store')->middleware(['auth', 'verified']);
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit')->middleware(['auth', 'verified']);
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update')->middleware(['auth', 'verified']);
Route::get('/create/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware(['auth', 'verified']);

// Cart Controller Route Section
Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware(['auth', 'verified']);
Route::get('/cart/view/{id}', [CartController::class, 'view'])->name('cart.show')->middleware(['auth', 'verified']);
Route::get('/cart/delete/{id}', [CartController::class, 'destroy'])->name('cart.destroy')->middleware(['auth', 'verified']);

// Order Controller Route Section, 'verified'
Route::get('/order', [OrdersController::class, 'index'])->name('order.index')->middleware(['auth', 'verified']);
Route::get('/order/view/{id}', [OrdersController::class, 'view'])->name('order.view')->middleware(['auth', 'verified']);
Route::get('/order/delete/{id}', [OrdersController::class, 'destroy'])->name('order.destroy')->middleware(['auth', 'verified']);
// Delivered Order Route Section //
Route::get('/order/delivery/{id}', [OrdersController::class, 'delivered'])->name('delivered.order')->middleware(['auth', 'verified']);
// Print PDF Order Route Section //
Route::get('/generate/invoice/{id}', [PdfController::class, 'generate_pdf'])->name('invoice.view')->middleware(['auth', 'verified']);
Route::get('/download/invoice/{id}', [PdfController::class, 'download_pdf'])->name('invoice.prient')->middleware(['auth', 'verified']);

// Send Mail Route Section //
Route::get('/send/mail/{id}', [SendMailController::class, 'send_mail'])->name('send.email')->middleware(['auth', 'verified']);

// Send Mail Route Section //
Route::post('/send/user/mail/{id}', [SendMailController::class, 'send_user_mail'])->name('send_user.email')->middleware(['auth', 'verified']);








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

// Order View for user Route
Route::get('/order/view', [OrderController::class, 'order_view'])->name('order_view')->middleware(['auth']);
Route::get('/orders/destroy/{id}', [OrderController::class, 'destroy'])->name('orders.destroy')->middleware(['auth']);
Route::get('/view/order/{id}', [OrderController::class, 'view_order'])->name('view.order')->middleware(['auth']);

// invoice for user Route
Route::get('/invoice/view{id}', [invoiceController::class, 'generate_pdf'])->name('inovice_view.order')->middleware(['auth']);
Route::get('/invoice/print/{id}', [invoiceController::class, 'download_pdf'])->name('invoice_prine.order')->middleware(['auth']);

// Search Product for user Route
Route::get('/search', [HomeController::class, 'search'])->name('search.product');









require __DIR__ . '/auth.php';
