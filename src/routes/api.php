<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Abilities;

Route::middleware([Abilities::Auth->value])
    ->get('/dashboard', [AuthController::class, 'dashboard']);

Route::post('/confirm-account', [AuthController::class, 'confirmAccount']);
Route::post('/code', [AuthController::class, 'resendCode']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware([Abilities::Auth->value])->group(function() {
    // Get user data
    Route::get('/user', function (Request $request) { return $request->user(); });
    // Logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});
