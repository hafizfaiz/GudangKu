<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\AuthController;

// ========================================
// PUBLIC ROUTES (Tanpa Login)
// ========================================

// Registrasi
Route::post('/register', [AuthController::class, 'register']);

// Login
Route::post('/login', [AuthController::class, 'login']);


// ========================================
// PROTECTED ROUTES (Wajib Login)
// ========================================

Route::middleware('auth:sanctum')->group(function () {

    // User Authentication
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // User Management
    Route::get('/users', [UserController::class, 'index'])->middleware('admin');
    Route::post('/users', [UserController::class, 'store'])->middleware('admin');
    Route::get('/users/{id}', [UserController::class, 'show'])->middleware('admin');
    Route::put('/users/{id}', [UserController::class, 'update'])->middleware('admin');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware('admin');

    // Category Routes
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

    // Product Routes
    Route::get('/products/export', [ProductController::class, 'export']);
    Route::get('/products/low-stock', [ProductController::class, 'lowStock']);
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout']);

});
