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
    Route::get('/job/{jobStatus}', [\App\Http\Controllers\User\UserController::class, 'showJobOfUser'])->name('user.job');
    Route::post('/updateDesc', [\App\Http\Controllers\User\UserController::class, 'update'])->name('user.update');
    Route::post('/deleteUser/{userId}', [\App\Http\Controllers\User\UserController::class, 'deleteUser'])->name('user.delete');
    Route::post('/updateSkill', [\App\Http\Controllers\User\UserController::class, 'updateSkill'])
        ->name('user.addSkill');
    Route::post('/addExperience/{userId}', [\App\Http\Controllers\User\ExperienceController::class, 'addExperience'])
        ->name('user.addExperience');
    Route::post('/editExperience/{experienceId}',
        [\App\Http\Controllers\User\ExperienceController::class, 'editExperience'])
        ->name('user.editExperience');
    Route::post('/deleteExperience/{experienceId}/{userId}',
        [\App\Http\Controllers\User\ExperienceController::class, 'deleteExperience'])
        ->name('user.deleteExperience');
    Route::post('/addEducation/{userId}', [\App\Http\Controllers\User\EducationController::class, 'addEducation'])
        ->name('user.addEducation');
    Route::post('/addEducation/{educationId}/{userId}', [\App\Http\Controllers\User\EducationController::class, 'deleteEducation'])
        ->name('user.deleteEducation');
    Route::post('/editEducation/{educationId}',
        [\App\Http\Controllers\User\EducationController::class, 'editEducation'])
        ->name('user.editEducation');
    Route::post('/applyJob/{jobId}', [\App\Http\Controllers\User\JobController::class, 'applyJob'])
        ->name('user.applyJob');
    //user rating company
    Route::post('/ratingCompany/{companyId}', [\App\Http\Controllers\Company\CompanyController::class, 'ratingCompany'])
        ->name('user.rating');

});


