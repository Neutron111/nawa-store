<?php
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth','auth.type')->group(function () {           // use for secure routes *****// auth.type :admin,super-admin  هيك بقدر ابعت بارميتر للميديل وير اللي عملتها انا واعرف في الميثود هناك بارميترز

// Admin Routes
Route::get('/admin/products/trashed', [ProductController::class, 'trashed'])->name('Products.trashed')->middleware('auth');
Route::put('/admin/products/{product}/restore', [ProductController::class, 'restore'])->name('Products.restore');
Route::delete('/admin/products/{product}/force', [ProductController::class, 'forceDelete'])->name('Products.force-delete');


Route::resource('/Admin/Products', ProductController::class);
});
