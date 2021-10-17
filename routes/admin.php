<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CodeController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\DepartmentsController;


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
    Route::get('users/create',[UserController::class,'create'])->name('users.create');
    Route::post('users/store',[UserController::class,'store'])->name('users.store');
    Route::get('users/edit/{id}',[UserController::class,'edit'])->name('users.edit');
    Route::post('users/update/{id}',[UserController::class,'update'])->name('users.update');
    Route::get('users/delete/{id}',[UserController::class,'delete'])->name('users.delete');
    //Admin Controller
    Route::get('admins',[AdminController::class,'index'])->name('admins');
    Route::get('admins/create',[AdminController::class,'create'])->name('admins.create');
    Route::post('admins/store',[AdminController::class,'store'])->name('admins.store');
    Route::get('admins/edit/{id}',[AdminController::class,'edit'])->name('admins.edit');
    Route::post('admins/update/{id}',[AdminController::class,'update'])->name('admins.update');
    Route::get('admins/activ/{id}',[AdminController::class,'activ'])->name('admins.activ');
    Route::get('admins/desactiv/{id}',[AdminController::class,'desactiv'])->name('admins.desactiv');
    Route::get('admins/delete/{id}',[AdminController::class,'delete'])->name('admins.delete');
    //Code Controller
    Route::get('codes',[CodeController::class,'index'])->middleware(['auth:admin'])->name('codes');
    Route::get('codes/create',[CodeController::class,'create'])->name('codes.create');
    Route::post('codes/store',[CodeController::class,'store'])->name('codes.store');

    Route::get('codes/import',[CodeController::class,'upload'])->name('codes.excelUpload');
    Route::post('codes/import',[CodeController::class,'import'])->name('codes.excelImport');

    Route::get('codes/edit/{id}',[CodeController::class,'edit'])->name('codes.edit');
    Route::post('codes/update/{id}',[CodeController::class,'update'])->name('codes.update');
    Route::get('codes/delete/{id}',[CodeController::class,'delete'])->name('codes.delete');
    //Discount Controller
    Route::get('discounts',[DiscountController::class,'index'])->middleware(['auth:admin'])->name('discounts');
    Route::get('discounts/create',[DiscountController::class,'create'])->name('discounts.create');
    Route::post('discounts/store',[DiscountController::class,'store'])->name('discounts.store');
    Route::get('discounts/edit/{id}',[DiscountController::class,'edit'])->name('discounts.edit');
    Route::post('discounts/update/{id}',[DiscountController::class,'update'])->name('discounts.update');
    Route::get('discounts/delete/{id}',[DiscountController::class,'delete'])->name('discounts.delete');
     //tappayments
     Route::get('tappayments', 'TapPayments@tappayments');
     Route::post('tappayments', 'TapPayments@tappayments_save');
    //Route::post('codes/delete_all',[CodeController::class,'delete'])->name('codes.delete_all');
    //article Controller
    Route::resource('article','ArticlesController');
    Route::get('article/{id}/delete',[ArticlesController::class,'delete']);
    //article Controller
    Route::resource('department','DepartmentsController');
    Route::get('department/{id}/delete',[DepartmentsController::class,'delete_department']);

});
