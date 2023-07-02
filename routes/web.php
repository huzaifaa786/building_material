<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::view('admin/layout', 'admin.layout');
Route::view('admin/cateogry/create', 'admin.category.create')->name('admin.category.create');
Route::view('vendor/product/create', 'vendor.product.create')->name('vendor.product.create');
Route::view('admin/units/unit', 'admin.units.unit')->name('admin.units.unit');
Route::view('vendor/product/allproducts', 'vendor.product.allproducts')->name('vendor.product.allproducts');
Route::view('admin/login', 'admin.auth.login');
Route::post('admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
Route::post('product/edit', [CategoryController::class, 'update'])->name('edit/product');
Route::post('admin/units/storee', [UnitController::class, 'storee'])->name('admin.units.storee');
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('admin/category/allcategories', [CategoryController::class, 'index'])->name('admin.category.allcategories');
Route::get('category/{id}', [CategoryController::class, 'destroy'])->name('delete_category');
Route::get('vendor/product/create', [CategoryController::class, 'show'])->name('vendor.product.create');
Route::get('vendor/product/allproducts', [ProductController::class, 'vendorIndex'])->name('vendor.product.allproducts')->middleware(['auth:vendor']);
Route::post('all/product', [ProductController::class, 'update'])->name('product/all');
Route::get('del/{id}', [ProductController::class, 'destroy'])->name('del_product');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.auth.login');
Route::get('logout/admin', [AdminController::class, 'logout'])->name('logout.admin');
Route::view('admin/create', 'admin.vendor.create')->name('admin.vendor.create');
Route::post('admin/store', [VendorController::class, 'store'])->name('admin.vendor.store');
Route::view('admin/allvendor', 'admin.vendor.allvendor')->name('admin.vendor.allvendor');
Route::get('admin/vendor/allvendors', [VendorController::class, 'show'])->name('admin.vendor.show');
Route::get('delete/{id}', [VendorController::class, 'delete'])->name('delete_vendor');
Route::post('all/vendor', [VendorController::class, 'update'])->name('vendor/all');
Route::view('vendor/layout', 'vendor.layout');
Route::view('vendor/login', 'vendor.auth.login')->name('vendor.auth.login');
Route::post('vendor/login', [VendorController::class, 'vendorLogin'])->name('vendor.auth.store');
Route::get('logout', [VendorController::class, 'logout'])->name('logout.vendor');
Route::view('vendor/dashboard', 'vendor.dashboard.dashboard')->name('vendor.dashboard.dashboard');
Route::get('vendor/products/{id}', [VendorController::class, 'showProducts'])->name('vendor.products');
Route::view('admin/index', 'admin.admindashboard.index')->name('admin.dashboard.index');
// Route::view('vendor/orders', 'vendor.vendororders.orders')->name('vendor.orders');
Route::get('vendor/order',  [VendorController::class, 'orderHistory'])->name('vendor.orders');
