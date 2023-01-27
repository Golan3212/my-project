<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as Admin;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\User\DownloadController;
use App\Http\Controllers\User\FeedbackController;
use App\Http\Controllers\User\IndexController as User;
use App\Http\Controllers\WelcomeController;
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
Route::get('/', [WelcomeController::class, 'welcome'])
    ->name('main');

Route::get('/sendNews', [NewsController::class, 'send'])
    ->name('news.send');

Route::get('/info/{project}', static function(string $project):string {
    return "About {$project}";
});

//admin
Route::group(['prefix'=>'admin', 'as'=>'admin.'], static function(){
    Route::get('/', Admin::class)
    ->name('index');
    Route::resource('category', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});
//User
Route::group(['prefix'=>'user', 'as'=>'user.'], static function(){
    Route::get('/', User::class)
        ->name('index');
    Route::resource('feedback', FeedbackController::class);
    Route::resource('download', DownloadController::class);
});

Route::group(['prefix'=>''], static function(){
    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');

    Route::get('/category', [CategoryController::class, 'categoryNews'])
        ->name('news.category');

    Route::get('/category/{id}/show', [CategoryController::class, 'showCategoryNews'])
        ->name('news.categoryNews')
        ->where('id', '\d+');

    Route::get('/news/{id}/show', [NewsController::class, 'show'])
        ->name('news.show')
        ->where('id', '\d+');
});

