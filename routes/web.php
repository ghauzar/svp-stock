<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

});