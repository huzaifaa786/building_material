<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::any('user/login', [UserController::class, 'userLogin']);
Route::any('register', [UserController::class, 'patientRegister']);
Route::any('all/category', [CategoryController::class, 'All']);
Route::any('get/product', [CategoryController::class, 'getproduct']);

// vendor routes
Route::group(['middleware' => 'auth:api'], function () {
    Route::any('vendor/all', [VendorController::class, 'allVendors']);
    Route::any('vendor/products', [VendorController::class, 'vendorProducts']);
});
