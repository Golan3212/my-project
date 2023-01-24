<?php

use App\Http\Controllers\Admin\IndexController as Admin;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
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
Route::group(['prefix'=>'admin'], static function(){
    Route::get('/', Admin::class)
    ->name('admin.index');
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

