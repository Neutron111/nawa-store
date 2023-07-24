<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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

Route::get('/',[HomeController::class,'index'])->name('home');

// // For index, create, store, show, edit, update, and destroy methods
// For trashed, restore, and forceDelete methods
Route::get('/admin/products/trashed', [\App\Http\Controllers\Admin\ProductController::class, 'trashed'])->name('Products.trashed');
Route::put('/admin/products/{product}/restore', [\App\Http\Controllers\Admin\ProductController::class, 'restore'])->name('Products.restore');
Route::delete('/admin/products/{product}/force', [\App\Http\Controllers\Admin\ProductController::class, 'forceDelete'])->name('Products.force-delete');


Route::resource('/Admin/Products', ProductController::class); ///to build all routs to specific controller

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{first}', [UserController::class, 'show']);
