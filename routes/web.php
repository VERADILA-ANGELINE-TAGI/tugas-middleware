<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

Route::get('/products', [ProductController::class, 'index']);

Route::get('/login', [LoginController::class, 'showLogin']);

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/admin', [AdminController::class, 'index']);