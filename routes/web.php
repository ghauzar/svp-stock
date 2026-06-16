<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class,'showLogin'])
     ->name('login');

Route::post('/login', [AuthController::class,'login']);

Route::post('/logout', [AuthController::class,'logout']);

Route::middleware('check.login')
->group(function(){

    Route::get('/dashboard', function () {

        return view('dashboard');

    });

    Route::resource(
        'categories',
        CategoryController::class
    );

    Route::resource(
        'products',
        ProductController::class
    );

    Route::resource(
        'stocks',
        StockController::class
    );

    
    // Route untuk transaksi
    Route::get(
        '/transactions/barang-masuk',
        [TransactionController::class,'createMasuk']
    )->name('transactions.masuk');

    Route::post(
        '/transactions/barang-masuk',
        [TransactionController::class,'storeMasuk']
    )->name('transactions.storeMasuk');

    Route::get(
        '/transactions/barang-keluar',
        [TransactionController::class,'createKeluar']
    )->name('transactions.keluar');

    Route::post(
        '/transactions/barang-keluar',
        [TransactionController::class,'storeKeluar']
    )->name('transactions.storeKeluar');

    Route::resource(
        'transactions',
        TransactionController::class
    );

});