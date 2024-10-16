<?php

use App\Http\Controllers\KitchenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('kitchens', KitchenController::class);
Route::prefix('kitchens')->get('/{kitchen}/users/', [KitchenController::class, 'getUsersBelongToKitchen']);
