<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\JobController;
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
Route::view('/welcome','welcome');
Route::get('/',[AuthenticationController::class,"showLogin"])->name('/login');
Route::post('/login',[AuthenticationController::class,"login"])->name('login');
Route::get('/register',[AuthenticationController::class,"showRegister"])->name('/register');
Route::post('/register',[AuthenticationController::class,"register"])->name('register');
Route::get('/logout',[AuthenticationController::class,"logout"])->name("logout");
//package
Route::get('packages/create',[PackageController::class,'create'])->name('create_package');
Route::post('packages/create', [PackageController::class,'store'])->name('package_store');
Route::get('packages/list',[PackageController::class,'index'])->name('package_list');
Route::get('packages/edit/{id}',[PackageController::class,'edit'])->name('package_edit');  
Route::post('packages/update/{id}',[PackageController::class,'update'])->name('package_update');
Route::delete('packages/destroy/{id}',[PackageController::class,'destroy'])->name('package_delete');
//job
Route::get('jobs/create',[JobController::class,'create'])->name('create_job');
Route::post('jobs/store', [JobController::class,'store'])->name('job_store');
Route::get('jobs/list',[JobController::class,'index'])->name('job_list');
Route::get('jobs/edit/{id}',[JobController::class,'edit'])->name('job_edit');  
Route::post('jobs/update/{id}',[JobController::class,'update'])->name('job_update');
Route::delete('jobs/destroy/{id}',[JobController::class,'destroy'])->name('job_delete');