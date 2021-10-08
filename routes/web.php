<?php

use Illuminate\Support\Facades\Route;

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
