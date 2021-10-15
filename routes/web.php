<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CodeRgController;
use Illuminate\Support\Facades\Artisan;
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
require __DIR__.'/auth.php';

Route::get('/clear-all', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return back();
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('signup-supervisor', function (){
    return view('admin.auth.sign-up-supervisor-form');
})->middleware('guest')->name('signUpSupervisorForm');

Route::post('signUpSupervisor', ['App\Http\Controllers\Admin\AdminController', 'signUpSupervisor'])->name('signUpSupervisor');

Route::get('/our-services', function (){
    return view('user.pages.our-services');
})->name('ourServices');

Route::post('/saveAvatar', [CodeRgController::class, 'saveAvatar'])->name('saveAvatar');
Route::get('/choose-avatar', [CodeRgController::class, 'chooseAvatar']);
Route::get('/sign-up', [CodeRgController::class, 'signup']);
Route::get('/coderg/{coderg}', [CodeRgController::class, 'codeRg']);
