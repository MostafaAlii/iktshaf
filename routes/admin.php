<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CodeController;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth:admin'])
    ->name('dashboardAdmin');
    Route::get('/users',[UserController::class,'index'])->middleware(['auth:admin'])->name('users');
    Route::get('/admins',[AdminController::class,'index'])->middleware(['auth:admin'])->name('admins');
    Route::get('/codes',[CodeController::class,'index'])->middleware(['auth:admin'])->name('codes');

