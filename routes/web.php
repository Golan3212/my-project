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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', static function(string $name):string {
 return "Hello, {$name}";
});

Route::get('/info/{project}', static function(string $project):string {
    return "About {$project}";
});

Route::get('/news/{id}', static function(int $id):string {
    return "news number with id $id";
});