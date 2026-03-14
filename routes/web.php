<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::view('departments', 'departments')->name('departments');
    Route::view('positions', 'positions')->name('positions');
    Route::view('employees', 'employees')->name('employees');
    Route::view('paklaring', 'paklaring')->name('paklaring');
    Route::view('settings', 'settings')->name('settings');
    Route::view('users', 'users')->name('users');
    Route::view('activity-logs', 'activity-logs')->name('activity-logs');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/verify/{number}', function ($number) {
    $certificate = \App\Models\WorkCertificate::where('certificate_number', $number)
        ->with(['employee.department', 'employee.position'])
        ->first();
    return view('verify', compact('certificate'));
});

require __DIR__.'/auth.php';
