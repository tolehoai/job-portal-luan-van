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


Route::get('/admin/list', function () {
    return view('pages/admin/job/list');
});

Route::get('/register-verify/{verify_code}', [RegisterController::class, 'verifyRegister']);


Route::get('/', function () {
    return view('pages/user/index');
})->name('home.index');;

Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']); // @Todo Remove logout GET method


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

