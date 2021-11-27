<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CodeRgController;
use App\Http\Controllers\User\BlogArticleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::group(['middleware' => 'Maintenance'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('welcome');
});
Route::get('/maintenance', function () {
    return 'maintenance';
})->name('maintenanceMode');

/*Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
      })->middleware(['auth'])->name('dashboard');
});*/

Route::group(['middleware' => 'guest'], function () {
    Route::get('signup-supervisor', [HomeController::class, 'supervisorSignUp'])->name('signUpSupervisorForm');
    Route::get('our-services', [HomeController::class, 'getOurServicesPage'])->name('ourServices');
    Route::post('signUpSupervisor', [AdminController::class, 'signUpSupervisor'])->name('signUpSupervisor');

    Route::post('/saveAvatar', [CodeRgController::class, 'saveAvatar'])->name('saveAvatar');
    Route::get('/choose-avatar', [CodeRgController::class, 'chooseAvatar']);
    Route::get('/sign-up', [CodeRgController::class, 'signup']);
    Route::get('/coderg/{coderg}', [CodeRgController::class, 'codeRg']);
    Route::post('visa', [CodeRgController::class, 'visa']);
    Route::get('tappayment', [CodeRgController::class, 'tappayment']);
    Route::get('user/code', [CodeRgController::class, 'code']);

    // Article Controller
    Route::get('blog', [BlogArticleController::class, 'index'])->name('articlesBlog');
    Route::get('/blog-life', [BlogArticleController::class, 'index2'])->name('Bloglife');
    Route::get('/blog-writers', [BlogArticleController::class, 'writers'])->name('writers');
    Route::get('/blog/article/{id}', [BlogArticleController::class, 'getSingleArticale'])->name('single.article.page');
    // User Aricle Like
    Route::post('blog/like', [BlogArticleController::class, 'likeArticle'])->name('article.like');
    Route::get('tags/{title}', [BlogArticleController::class, 'tags'])->name('articlestags');
});

/*Route::post('signUpSupervisor', [AdminController::class, 'signUpSupervisor'])->name('signUpSupervisor');


Route::post('/saveAvatar', [CodeRgController::class, 'saveAvatar'])->name('saveAvatar');
Route::get('/choose-avatar', [CodeRgController::class, 'chooseAvatar']);
Route::get('/sign-up', [CodeRgController::class, 'signup']);
Route::get('/coderg/{coderg}', [CodeRgController::class, 'codeRg']);
Route::post('visa', [CodeRgController::class, 'visa']);
Route::get('tappayment', [CodeRgController::class, 'tappayment']);
Route::get('user/code', [CodeRgController::class, 'code']);

// Article Controller
Route::get('/blog', [BlogArticleController::class, 'index'])->name('articlesBlog');
Route::get('/blog-life', [BlogArticleController::class, 'index2'])->name('Bloglife');
Route::get('/blog-writers', [BlogArticleController::class, 'writers'])->name('writers');
Route::get('/blog/article/{id}', [BlogArticleController::class, 'getSingleArticale'])->name('single.article.page');
// User Aricle Like
Route::post('blog/like', [BlogArticleController::class, 'likeArticle'])->name('article.like');
Route::get('tags/{title}', [BlogArticleController::class, 'tags'])->name('articlestags');*/
