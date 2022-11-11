<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\User\UserController::class, 'index'])->name('user');
    Route::post('/updateDesc', [\App\Http\Controllers\User\UserController::class, 'update'])->name('user.addDesc');
    Route::post('/updateDesc', [\App\Http\Controllers\User\UserController::class, 'updateSkill'])
         ->name('user.addSkill');
});


