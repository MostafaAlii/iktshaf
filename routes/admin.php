<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;

=======
>>>>>>> fe022b9737ca271d6f838fc0f6c3c33438f0652e

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
<<<<<<< HEAD
    Route::get('/users',[UserController::class,'index'])->middleware(['auth:admin'])->name('users');
    Route::get('/admins',[AdminController::class,'index'])->middleware(['auth:admin'])->name('admins');
=======
>>>>>>> fe022b9737ca271d6f838fc0f6c3c33438f0652e

