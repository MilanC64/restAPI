<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\User\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function() {
    /* Byer routes */
    Route::resource('buyers', BuyerController::class)->only(['index', 'show']);

    /* Seller routes */
    Route::resource('sellers', SellerController::class)->only(['index', 'show']);
    
    /* Category routes */
    Route::resource('categories', CategoryController::class)->except(['create', 'edit']);
    
    /* Product routes */
    Route::resource('products', ProductController::class)->only(['index', 'show']);

    /* Transaction routes */
    Route::resource('transactions', TransactionController::class)->only(['index', 'show']);

    /* User routes */
    Route::resource('users', UserController::class)->except(['create', 'edit']);
});