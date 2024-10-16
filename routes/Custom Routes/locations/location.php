<?php

use App\Http\Controllers\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('locations', LocationController::class);
Route::prefix('locations')->get('/by-qr-code/{qrCode}', [LocationController::class, 'showByQrCode']);
