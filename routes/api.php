<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SaleController;

Route::apiResource('goods', GoodsController::class);
Route::apiResource('suppliers', SupplierController::class);
Route::apiResource('inventories', InventoryController::class);
Route::apiResource('expenses', ExpenseController::class);
Route::apiResource('employees', EmployeeController::class);
Route::apiResource('sales', SaleController::class);
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
