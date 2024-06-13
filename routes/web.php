<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

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



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {    
    Route::get('/', function () {
        return view('index');
    })->name('index');
    Route::get('/warehouse', [WarehouseController::class, 'index'])->name('product.index');
    Route::post('/warehouse/check', [WarehouseController::class, 'checkProduct'])->name('check.product');
    Route::get('/warehouse/get-product-details/{id}', [WarehouseController::class, 'getProductDetails'])->name('get.product.details');
    
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/return-note', [AdminController::class, 'storeReturnNote'])->name('return-note.store');
    Route::get('/admin/return-note-print/{damageID}', [AdminController::class, 'printReturnNote'])->name('print.return.note');
    Route::get('/admin/get-product-damaged/{id}', [AdminController::class, 'getProductDamaged'])->name('get.product.damaged');

    
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/export/{format}', [ProductController::class, 'export'])->name('export');
    Route::get('/products/export/{format}', [ProductController::class, 'export'])->name('export');


    Route::get('/shipment', [ShipmentController::class, 'index'])->name('shipment.index');
    Route::post('/shipment/ship', [ShipmentController::class, 'shipProduct'])->name('shipment.ship');
    Route::get('/shipment/return-note/{id}', [ShipmentController::class, 'showReturnNote'])->name('shipment.return_note');
    Route::get('/shipment/report', [ShipmentController::class, 'report'])->name('shipment.report');
});
