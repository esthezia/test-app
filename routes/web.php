<?php

use Illuminate\Support\Facades\Route;

// login and logout
Route::match(['get', 'post'], '/', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::prefix('app')->middleware('auth')->group(function () {
    // dashboard
    Route::get('', [\App\Http\Controllers\AppController::class, 'index'])->name('app');

    // only for roles "user" and "agent"
    Route::middleware(['role:user,agent'])->group(function () {
        Route::get('/issues', [\App\Http\Controllers\AppController::class, 'issues'])->name('app.issues');
    });

    // only for role "admin"
    Route::middleware('role:admin')->group(function () {
        // user management
        Route::get('/users', [\App\Http\Controllers\AppController::class, 'users'])->name('app.users');

        // reports
        Route::get('/reports', [\App\Http\Controllers\AppController::class, 'adminReports'])->name('app.reports');
    });
});
