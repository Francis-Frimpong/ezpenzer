<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\ExpensesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthenticationController::class, 'register']);
Route::post('login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('expenses', ExpensesController::class);
    Route::post('logout', [AuthenticationController::class, 'logOut']);

});

