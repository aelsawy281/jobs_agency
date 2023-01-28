<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
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

Route::get('/',[AuthenticationController::class,"showLogin"])->name('/login');
Route::post('/login',[AuthenticationController::class,"login"])->name('login');
Route::get('/register',[AuthenticationController::class,"showRegister"])->name('/register');
Route::post('/register',[AuthenticationController::class,"register"])->name('register');
Route::get('/logout',[AuthenticationController::class,"logout"])->name("logout");

   
