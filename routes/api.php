<?php

use App\Http\Controllers\Api\VerificationController;
use Illuminate\Support\Facades\Route;

Route::get('/v1/verify-paklaring/{number}', [VerificationController::class, 'verify']);
