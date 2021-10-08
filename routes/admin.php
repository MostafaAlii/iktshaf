<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;


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

Route::group([ 'middleware' => 'auth:admin'], function () {
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboardAdmin');
    //User Controller
    Route::get('users',[UserController::class,'index'])->name('users');
    //Admin Controller
    Route::get('admins',[AdminController::class,'index'])->name('admins');
    Route::get('admins/create',[AdminController::class,'create'])->name('admins.create');
    Route::post('admins/store',[AdminController::class,'store'])->name('admins.store');
    Route::get('admins/edit/{id}',[AdminController::class,'edit'])->name('admins.edit');
    Route::post('admins/update/{id}',[AdminController::class,'update'])->name('admins.update');
    Route::get('admins/activ/{id}',[AdminController::class,'activ'])->name('admins.activ');
    Route::get('admins/desactiv/{id}',[AdminController::class,'desactiv'])->name('admins.desactiv');
    Route::get('admins/delete/{id}',[AdminController::class,'delete'])->name('admins.delete');

});
