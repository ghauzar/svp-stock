<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class,'showLogin'])
     ->name('login');

Route::post('/login', [AuthController::class,'login']);

Route::post('/logout', [AuthController::class,'logout']);

Route::middleware('check.login')
->group(function(){

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');

    Route::resource(
        'categories',
        CategoryController::class
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


    Route::get(
        '/products/import',
        [ProductController::class, 'showImportForm']
    )->name('products.import.form');

    Route::post(
        '/products/import',
        [ProductController::class, 'import']
    )->name('products.import');
    
    Route::get(
        '/products/template',
        [ProductController::class, 'downloadTemplate']
    )->name('products.template');

    // Stok menipis
    Route::get(
        '/stok-menipis',
        [ProductController::class, 'stokMenipis']
    )->name('products.stokMenipis');
    
    Route::resource(
        'products',
        ProductController::class
    );
});