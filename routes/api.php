<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public Authentication Endpoints
Route::post('/register', [AuthController::class, 'register'])
    ->middleware('throttle:6,1');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:6,1');

// Protected Routes (Requires Sanctum Token Authentication)
Route::middleware('auth:sanctum')->group(function () {
    
    // Profile & Logout
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Admin Dashboard (Protected by 'admin' middleware)
    Route::get('/admin/dashboard', function () {
        return response()->json([
            'message' => 'Welcome to the Admin Dashboard'
        ]);
    })->middleware('admin');

    // Student Dashboard (Protected by 'role:student' middleware)
    Route::get('/student/dashboard', function () {
        return response()->json([
            'message' => 'Welcome to the Student Dashboard'
        ]);
    })->middleware('role:student');

    // Students Endpoint (Accessible by both admins and students)
    Route::get('/students', function () {
        return response()->json([
            'message' => 'Authorized list of students'
        ]);
    })->middleware('role:admin,student');

});