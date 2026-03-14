<?php

use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\Api\EmployeeApiController;
use App\Http\Controllers\Api\WorkCertificateApiController;
use Illuminate\Support\Facades\Route;

Route::get('/v1/verify-paklaring/{number}', [VerificationController::class, 'verify']);

Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('employees', EmployeeApiController::class);
    Route::get('paklaring', [WorkCertificateApiController::class, 'index']);
    Route::get('paklaring/{id}', [WorkCertificateApiController::class, 'show']);
    Route::get('paklaring/download/{id}', [WorkCertificateApiController::class, 'download']);
});
