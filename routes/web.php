<?php
use App\Http\Controllers\Website\AboutUsController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\CheckoutController;
use App\Http\Controllers\Website\ContactUsController;
use App\Http\Controllers\Website\IndexController;
use App\Http\Controllers\Website\ShopController;
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
Route::get('/website/cart',[CartController::class , 'index'])->name('website.cart');
Route::get('/website/checkout',[CheckoutController::class , 'index'])->name('website.checkout');
Route::get('/website/contact-us', [ContactUsController::class , 'index'])->name('website.contact-us');
Route::post('/website/contact-us/store', [ContactUsController::class , 'store'])->name('website.contact-us.store');
Route::get('/website/single-product', function () { return view('website.wishlist');})->name('website.wishlist');
Route::get('/website/wishlist',[WishlistController::class , 'index'])->name('website.wishlist');