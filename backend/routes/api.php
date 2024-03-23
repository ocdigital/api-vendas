<?php

use App\Http\Controllers\SaleController;
use App\Http\Controllers\SellerController;
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

//list seller
Route::get('seller', [SellerController::class, 'index']);
Route::post('seller', [SellerController::class, 'store']);

Route::get('sale/{sellerId}', [SaleController::class, 'getAllBySellerId']);
Route::post('sale', [SaleController::class, 'store']);