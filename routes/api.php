<?php

use App\Http\Controllers\Api\ExpensesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('expenses', ExpensesController::class);
