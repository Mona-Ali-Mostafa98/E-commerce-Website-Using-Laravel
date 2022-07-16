<?php

use App\Http\Controllers\Admin\CategoryController;
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

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/admin/categories' , [CategoryController::class , 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create' , [CategoryController::class , 'create'])->name('admin.categories.create');
Route::post('/admin/categories' , [CategoryController::class , 'store'])->name('admin.categories.store');
Route::get('/admin/categories/{category}' , [CategoryController::class , 'show'])->name('admin.categories.show');
Route::get('/admin/categories/{category}/edit' , [CategoryController::class , 'edit'])->name('admin.categories.edit');
Route::put('/admin/categories/{category}' , [CategoryController::class , 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{category}' , [CategoryController::class , 'destroy'])->name('admin.categories.destroy');