<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\Accountantcontroller;
use App\Http\Controllers\PurchaseInvoiceController;

// Public Route
Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::middleware(['role:admin'])->group(function () {
        Route::resource('employees', EmployeeController::class);
        Route::resource('inventories', InventoryController::class);


    });


    Route::middleware(['role:admin|accountant'])->group(function () {
        Route::resource('expenses', ExpenseController::class);
        Route::get('/accountant/dashboard', [AccountantController::class, 'index'])->name('accountant.dashboard');
        Route::get('/accountant/financial-data', [AccountantController::class, 'financial_data'])->name('accountant.financial_data');
        Route::get('/invoice/{id}', [SaleController::class, 'printInvoice'])->name('invoice.print');
        Route::get('/purchase-invoice/create', [PurchaseInvoiceController::class, 'create'])->name('purchase_invoice.create');
        Route::post('/purchase-invoice/store', [PurchaseInvoiceController::class, 'store'])->name('purchase_invoice.store');

    });


    Route::resource('goods', GoodsController::class);
    Route::resource('suppliers', SupplierController::class);

    Route::resource('sales', SaleController::class);
});


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


require __DIR__.'/auth.php';
