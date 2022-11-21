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


Route::get('/', [\App\Http\Controllers\User\IndexController::class, 'index'])->name('home.index');;

Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']); // @Todo Remove logout GET method


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index'])->name('company');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cv/{userId}/{jobId}', [\App\Http\Controllers\User\UserController::class, 'showCV'])->name('cv');


Route::get('/jobs', [\App\Http\Controllers\Admin\JobController::class, 'showListJob'])->name('jobs');
Route::get('/job/{jobId}', [\App\Http\Controllers\Admin\JobController::class, 'showJobDetail'])->name('job.detail');
