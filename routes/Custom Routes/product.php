<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);

// get product details by qr code
Route::prefix('products')->get('/by-qr-code/{qrCode}', [ProductController::class, 'showByQrCode']);

// withdraw product
Route::prefix('products')->put('/withdraw/{product}', [ProductController::class, 'withdrawProduct'])->middleware('withdraw.product');

// return product
Route::prefix('products')->put('/return/{product}', [ProductController::class, 'returnProduct']);
