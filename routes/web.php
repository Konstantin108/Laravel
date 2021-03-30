<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

//<-- используем свой контроллер

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function ()
{
    return "<h1>Добро пожаловать на сайт, это учебный проект \"Агрегатор новостей\"</h1>
            <a href='".route('category')."'>перейти к новостям</a><br>
            <a href='".route('create')."'>предложить новость</a>";

});

Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/category', [CategoryController::class, 'index'])->name('category');

Route::get('/news/show/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')->name('news.show');

Route::get('/category/show/{name}', [CategoryController::class, 'show'])
    ->where('name', '[\w+\s*\w+]*')->name('category.show');

Route::get('/create', [NewsController::class, 'create'])->name('create');

//for admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('/category', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/create', AdminNewsController::class);
});


