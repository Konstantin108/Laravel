<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use \App\Http\Controllers\Admin\UnloadingController as AdminUnloadingController;

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
    return view('index');

});

Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/message', [NewsController::class, 'message'])->name('message');

Route::get('/answer', [NewsController::class, 'answer'])->name('answer');

Route::get('/category', [CategoryController::class, 'index'])->name('category');

Route::post('/messageStore', [NewsController::class, 'messageStore'])->name('messageStore');

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
    Route::resource('/unloading', AdminUnloadingController::class);
});


