<?php
use App\Http\Controllers\Website\AboutUsController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\CheckoutController;
use App\Http\Controllers\Website\ContactUsController;
use App\Http\Controllers\Website\IndexController;
use App\Http\Controllers\Website\OrderController;
use App\Http\Controllers\Website\ShopController;
use App\Http\Controllers\Website\UserController;
use App\Http\Controllers\Website\WishlistController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [IndexController::class , 'index'])->name('website.index');
Route::get('/website/shop', [ShopController::class , 'index'])->name('website.shop');
Route::get('/website/about-us',[AboutUsController::class , 'index'])->name('website.about-us');

// Route::get('/website/checkout',[CheckoutController::class , 'index'])->name('website.checkout');
Route::get('/website/contact-us', [ContactUsController::class , 'index'])->name('website.contact-us');
Route::post('/website/contact-us/store', [ContactUsController::class , 'store'])->name('website.contact-us.store');
Route::get('/website/single-product', function () { return view('website.wishlist');})->name('website.wishlist');
Route::get('/website/wishlist',[WishlistController::class , 'index'])->name('website.wishlist');

Route::prefix('website/cart')->name('website.')->group(function () {
    Route::get('/',[CartController::class , 'index'])->name('cart');
    Route::post('store',[CartController::class , 'store'])->name('cart.store');
    Route::patch('update',[CartController::class , 'update'])->name('cart.update');       //patch use in case of update more than one
    Route::delete('destroy',[CartController::class , 'destroy'])->name('cart.destroy');   //don't take id, remove all cart
});

 Route::get('website/login-register', [UserController::class, 'index'])->name('website.login-register');
 Route::post('website/register', [UserController::class, 'store'])->name('website.register');

Route::post('/website/login', [UserController::class, 'login'])->name('website.login');
Route::get('/website/logout', [UserController::class, 'logout'])->name('website.logout')->middleware('auth');

Route::get('/website/checkout/index',[CheckoutController::class , 'index'])->name('website.checkout.index');
Route::post('/website/checkout',[CheckoutController::class , 'store'])->name('website.checkout');

Route::get('/orders/{order}', [OrderController::class , 'show'])->name('orders.show');