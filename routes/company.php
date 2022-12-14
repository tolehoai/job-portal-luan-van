<?php

use App\Http\Controllers\Company\Auth\LoginController;
use App\Http\Controllers\Company\Auth\ForgotPasswordController;
use App\Http\Controllers\Company\Auth\ResetPasswordController;
use App\Http\Controllers\Company\CompanyController;
use Illuminate\Support\Facades\Route;


Route::get('login', [LoginController::class, 'showLoginForm'])->name('company.login');
Route::post('login', [LoginController::class, 'login']);

//Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::post('logout', [LoginController::class, 'logout'])->name('company.logout'); // @Todo Remove logout GET method

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('company.password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('company.password.email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('company.password.update');

Route::middleware('company.auth')->group(function () {
    Route::get('/', [CompanyController::class, 'index'])->name('company.dashboard');
    Route::get('/info', [CompanyController::class, 'companyInfo'])->name('company.info');
    Route::get('/editCompany', [CompanyController::class, 'editCompany'])->name('company.edit');
    Route::post('/editCompany', [CompanyController::class, 'editCompany'])->name('company.edit');
    //job
    Route::get('/job', [\App\Http\Controllers\Company\JobController::class, 'index'])->name('company.job');
    Route::post('/job', [\App\Http\Controllers\Company\JobController::class, 'addJob'])->name('company.addJob');
    Route::get('/jobList', [\App\Http\Controllers\Company\JobController::class, 'showJobList'])
        ->name('company.jobList');
    Route::get('/editJob/{jobId}', [\App\Http\Controllers\Company\JobController::class, 'editJob'])
        ->name('company.editJob');
    Route::post('/editJob/{jobId}', [\App\Http\Controllers\Company\JobController::class, 'editJob'])
        ->name('company.editJob');
    Route::get('/jobDetail/{jobId}', [\App\Http\Controllers\Company\JobController::class, 'jobDetail'])
        ->name('company.jobDetail');
    Route::get('/jobUser/{job_id}', [\App\Http\Controllers\Company\JobController::class, 'showJobUserList'])
        ->name('company.jobUserList');
    //Delete job
    Route::post('/deleteJob/{jobId}', [\App\Http\Controllers\Company\JobController::class, 'deleteJob'])
        ->name('company.deleteJob');

    Route::get('/showJobCV/{jobId}', [\App\Http\Controllers\Company\JobController::class, 'showJobCV'])->name('showJobCV');
    Route::post('/changeCandidateStatus/{jobId}/{candidateID}', [\App\Http\Controllers\Company\JobController::class, 'changeCandidateStatus'])->name('changeCandidateStatus');
    //candidate
    Route::get('/candidate', [\App\Http\Controllers\Company\CandidateController::class, 'index'])
        ->name('company.candidate');
    //Send invitation mail
    Route::post('/sendInvitationMail/{jobId}/{candidateID}', [\App\Http\Controllers\Company\JobController::class, 'sendInvitationMail'])->name('company.sendInvitationMail');
    Route::get('/showCandidateHistory/{companyId}/{candidateID}', [\App\Http\Controllers\Company\JobController::class, 'showCandidateHistory'])->name('company.showCandidateHistory');
});
