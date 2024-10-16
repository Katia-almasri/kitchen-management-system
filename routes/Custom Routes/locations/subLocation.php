<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\SubLocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('sub-location', SubLocationController::class);
