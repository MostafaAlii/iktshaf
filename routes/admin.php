<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CodeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentsController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\keyCodeController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NationalityController;
use App\Http\Controllers\Admin\PointController;
use Illuminate\Support\Facades\Route;
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

Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboardAdmin');

    //User Controller
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');

    //Admin Controller
    Route::get('admins', [AdminController::class, 'index'])->name('admins');
    Route::get('admins/create', [AdminController::class, 'create'])->name('admins.create');
    Route::post('admins/store', [AdminController::class, 'store'])->name('admins.store');
    Route::get('admins/edit/{id}', [AdminController::class, 'edit'])->name('admins.edit');
    Route::post('admins/update/{id}', [AdminController::class, 'update'])->name('admins.update');
    Route::get('admins/activ/{id}', [AdminController::class, 'activ'])->name('admins.activ');
    Route::get('admins/desactiv/{id}', [AdminController::class, 'desactiv'])->name('admins.desactiv');
    Route::get('admins/delete/{id}', [AdminController::class, 'delete'])->name('admins.delete');

    //Code Controller
    Route::get('codes', [CodeController::class, 'index'])->middleware(['auth:admin'])->name('codes');
    Route::get('codes/create', [CodeController::class, 'create'])->name('codes.create');
    Route::post('codes/store', [CodeController::class, 'store'])->name('codes.store');
    Route::get('codes/import', [CodeController::class, 'upload'])->name('codes.excelUpload');
    Route::post('codes/import', [CodeController::class, 'import'])->name('codes.excelImport');
    Route::get('codes/edit/{id}', [CodeController::class, 'edit'])->name('codes.edit');
    Route::post('codes/update/{id}', [CodeController::class, 'update'])->name('codes.update');
    Route::get('codes/delete/{id}', [CodeController::class, 'delete'])->name('codes.delete');

    //Discount Controller
    Route::get('discounts', [DiscountController::class, 'index'])->middleware(['auth:admin'])->name('discounts');
    Route::get('discounts/create', [DiscountController::class, 'create'])->name('discounts.create');
    Route::post('discounts/store', [DiscountController::class, 'store'])->name('discounts.store');
    Route::get('discounts/edit/{id}', [DiscountController::class, 'edit'])->name('discounts.edit');
    Route::post('discounts/update/{id}', [DiscountController::class, 'update'])->name('discounts.update');
    Route::get('discounts/delete/{id}', [DiscountController::class, 'delete'])->name('discounts.delete');

    //tapPayments
    Route::get('tappayments', 'TapPayments@tappayments');
    Route::post('tappayments', 'TapPayments@tappayments_save');
    //Route::post('codes/delete_all',[CodeController::class,'delete'])->name('codes.delete_all');

    //article Controller
    Route::resource('article', 'ArticlesController');
    Route::get('article/{id}/delete', [ArticlesController::class, 'delete']);

    //department Controller
    Route::resource('department', 'DepartmentsController');
    Route::get('department/{id}/delete', [DepartmentsController::class, 'delete_department']);

    //country
    Route::get('country', [keyCodeController::class, 'indexCountry'])->name('indexCountry');
    Route::get('country/create', [keyCodeController::class, 'createCountry'])->name('createCountry');
    Route::post('country/store', [keyCodeController::class, 'storeCountry'])->name('storeCountry');
    Route::get('country/edit/{id}', [keyCodeController::class, 'editCountry'])->name('editCountry');
    Route::post('country/update', [keyCodeController::class, 'updateCountry'])->name('updateCountry');
    Route::get('country/delete/{id}', [keyCodeController::class, 'deleteCountry'])->name('deleteCountry');
    Route::get('country/import', [keyCodeController::class, 'uploadCountry'])->name('uploadCountry.excelUpload');
    Route::post('country/import', [keyCodeController::class, 'importCountry'])->name('importCountry.excelImport');

    //city
    Route::get('city', [keyCodeController::class, 'indexCity'])->name('indexCity');
    Route::get('city/create', [keyCodeController::class, 'createCity'])->name('createCity');
    Route::post('city/store', [keyCodeController::class, 'storeCity'])->name('storeCity');
    Route::get('city/edit/{id}', [keyCodeController::class, 'editCity'])->name('editCity');
    Route::post('city/update', [keyCodeController::class, 'updateCity'])->name('updateCity');
    Route::get('city/delete/{id}', [keyCodeController::class, 'deleteCity'])->name('deleteCity');
    Route::get('city/import', [keyCodeController::class, 'uploadCity'])->name('uploadCity.excelUpload');
    Route::post('city/import', [keyCodeController::class, 'importCity'])->name('importCity.excelImport');

    //school
    Route::get('school', [keyCodeController::class, 'indexSchool'])->name('indexSchool');
    Route::get('school/create', [keyCodeController::class, 'createSchool'])->name('createSchool');
    Route::post('school/store', [keyCodeController::class, 'storeSchool'])->name('storeSchool');
    Route::get('school/edit/{id}', [keyCodeController::class, 'editSchool'])->name('editSchool');
    Route::post('school/update', [keyCodeController::class, 'updateSchool'])->name('updateSchool');
    Route::get('school/delete/{id}', [keyCodeController::class, 'deleteSchool'])->name('deleteSchool');
    Route::get('school/import', [keyCodeController::class, 'uploadSchool'])->name('uploadSchool.excelUpload');
    Route::post('school/import', [keyCodeController::class, 'importSchool'])->name('importSchool.excelImport');

    // Nationality
    Route::get('nationality', [NationalityController::class, 'index'])->name('nationality.index');
    Route::get('nationality/create', [NationalityController::class, 'create'])->name('nationality.create');
    Route::post('nationality/store', [NationalityController::class, 'store'])->name('nationality.store');
    Route::get('nationality/edit/{id}', [NationalityController::class, 'edit'])->name('nationality.edit');
    Route::post('nationality/update/{id}', [NationalityController::class, 'update'])->name('nationality.update');
    Route::get('nationality/delete/{id}', [NationalityController::class, 'delete'])->name('nationality.delete');

    //Tests
    Route::resource('tests', 'TestController');
    Route::get('tests/destroy/{id}', [TestController::class, 'destroy']);

    //Questions
    Route::resource('questions', 'QuestionController');
    Route::get('questions/destroy/{id}', [QuestionController::class, 'destroy']);

    //Points Controller
    Route::get('points', [PointController::class, 'index'])->name('points');
    Route::get('points/create', [PointController::class, 'create'])->name('points.create');
    Route::post('points/store', [PointController::class, 'store'])->name('points.store');
    Route::get('points/edit/{id}', [PointController::class, 'edit'])->name('points.edit');
    Route::post('points/update/{id}', [PointController::class, 'update'])->name('points.update');
    Route::get('points/delete/{id}', [PointController::class, 'delete'])->name('points.delete');
});
