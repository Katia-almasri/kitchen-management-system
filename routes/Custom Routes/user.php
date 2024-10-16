<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('users', UserController::class);
Route::prefix('users')->post('/attach-role/{user}', [UserController::class, 'assignRoleToUser']);
