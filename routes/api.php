<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

// Register
Route::post('/register', [RegisteredUserController::class, 'store']);

// Login
Route::post('/login-api', [ApiAuthController::class, 'login']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth:sanctum');

// Password reset request
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store']);

// Password reset
Route::post('/reset-password', [NewPasswordController::class, 'store']);

// Email verification
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store']);
    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->name('verification.verify');
});

// Confirm password (optional)
Route::middleware('auth:sanctum')->post('/confirm-password', [ConfirmablePasswordController::class, 'store']);

