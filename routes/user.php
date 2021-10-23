<?php

use App\Http\Controllers\User\BlogArticleController;
use App\Http\Controllers\User\DashboardController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register site routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {

    Route::get('/profile',[DashboardController::class, 'profileUser'])->name('profileUser');

    Route::post('/saveComment',[BlogArticleController::class, 'saveComment'])->name('saveComment');
    Route::post('/saveReComment',[BlogArticleController::class, 'saveReComment'])->name('saveReComment');


});
