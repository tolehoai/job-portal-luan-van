<?php

use App\Http\Controllers\Company\Auth\LoginController;
use App\Http\Controllers\Company\Auth\ForgotPasswordController;
use App\Http\Controllers\Company\Auth\ResetPasswordController;
use App\Http\Controllers\Company\DashboardController;


Route::get('login', [LoginController::class, 'showLoginForm'])->name('company.login');
Route::post('login', [LoginController::class, 'login']);

//Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::get('logout', [LoginController::class, 'logout']); // @Todo Remove logout GET method

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('company.password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('company.password.email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('company.password.update');

Route::middleware('company.auth')->group(function () {
    Route::get('/', function () {
        return view('company/dashboard/index');
    })->name('company.dashboard');
});