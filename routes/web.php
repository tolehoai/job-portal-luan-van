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
Route::get('/cv/{userId}', [\App\Http\Controllers\User\UserController::class, 'showOnlyCV'])->name('showOnlyCv');

Route::get('/companies', [\App\Http\Controllers\Admin\CompanyController::class, 'showCompanyList'])->name('companies');
Route::get('/companyDetail/{companyId}', [\App\Http\Controllers\Admin\CompanyController::class, 'companyDetail'])->name('company.detail');

Route::get('/jobs', [\App\Http\Controllers\Admin\JobController::class, 'showListJob'])->name('jobs');
Route::get('/job/{jobId}', [\App\Http\Controllers\Admin\JobController::class, 'showJobDetail'])->name('job.detail');

Route::get('/companies', [\App\Http\Controllers\Admin\CompanyController::class, 'showCompanyList'])->name('companies');
//user accept offer
Route::get('/acceptOffer/{jobId}/{userId}/{access_token}', [\App\Http\Controllers\Company\JobController::class, 'acceptOffer'])
    ->name('user.offer.accept');
//user reject offer
Route::get('/rejectOffer/{jobId}/{userId}/{access_token}', [\App\Http\Controllers\Company\JobController::class, 'rejectOffer'])
    ->name('user.offer.reject');

