<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;


Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('login', [LoginController::class, 'login']);

//Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::get('logout', [LoginController::class, 'logout']); // @Todo Remove logout GET method

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.update');

Route::middleware('admin.auth')->group(function () {
    Route::get('/', function () {
        return view('pages/admin/index');
    })->name('admin.dashboard');
    //company
    Route::get('/company', [CompanyController::class, 'index'])->name('admin.companyList');
    Route::get('/add-company', [CompanyController::class, 'showAddCompany'])->name('admin.show-add-company');
    Route::post('/add-company', [CompanyController::class, 'addCompany'])->name('admin.add-company');
    Route::get('/edit-company/{companyId}', [CompanyController::class, 'editCompany'])->name('admin.edit-company');
    Route::post('/edit-company/{companyId}', [CompanyController::class, 'editCompany'])->name('admin.edit-company');
    //skill
    Route::get('/skills', [SkillController::class, 'index'])->name('admin.skill');
    Route::get('/add-skill', [SkillController::class, 'addSkill'])->name('admin.add-skill');
    Route::post('/add-skill', [SkillController::class, 'addSkill'])->name('admin.add-skill');
    Route::get('/edit-skill/{skillId}', [SkillController::class, 'editSkill'])
        ->name('admin.edit-skill');
    Route::post('/edit-skill/{skillId}', [SkillController::class, 'editSkill'])
        ->name('admin.edit-skill');
    //technology
    Route::post('/skills/delete', [SkillController::class, 'delete'])->name('admin.delete-skill');
    Route::get('/technologies', [TechnologyController::class, 'index'])->name('admin.technologies');
    Route::get('/add-technologies', [TechnologyController::class, 'addTechnology'])->name('admin.add-technology');
    Route::post('/add-technologies', [TechnologyController::class, 'addTechnology'])->name('admin.add-technology');
    Route::get('/edit-technologies/{technologyId}', [TechnologyController::class, 'editTechnology'])
        ->name('admin.edit-technology');
    Route::post('/edit-technologies/{technologyId}', [TechnologyController::class, 'editTechnology'])
        ->name('admin.edit-technology');
    Route::post('/technology/delete', [TechnologyController::class, 'delete'])->name('admin.delete-technology');
    //city
    Route::get('/cities', [CityController::class, 'index'])->name('admin.cities');
    Route::get('/add-city', [CityController::class, 'addCity'])->name('admin.add-city');
    Route::post('/add-city', [CityController::class, 'addCity'])->name('admin.add-city');
    Route::get('/edit-city/{cityId}', [CityController::class, 'editCity'])
        ->name('admin.edit-city');
    Route::post('/edit-city/{cityId}', [CityController::class, 'editCity'])
        ->name('admin.edit-city');
    Route::post('/city/delete', [CityController::class, 'delete'])->name('admin.delete-city');
    //job
    Route::get('/jobs', [JobController::class, 'index'])->name('admin.jobs');


});
