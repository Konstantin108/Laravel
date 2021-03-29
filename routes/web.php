<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\NewsController;
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

//<-- используем свой контроллер

Route::get('/', function () {
    return view('welcome');
});

Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/welcome/{name}', function (string $name): string {
    return "<h1>Добро пожаловать на сайт, {$name}</h1>";;
});

Route::get('/info', function () {
    return 'Это учебный проект с курса по Laravel';
});

Route::get('/news/show/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')->name('news.show');

//Route::get('/news', function()
//{
//    $news = ['первая новость', 'вторая новость'];
//
//    foreach ($news as $new){
//        echo "<h2>{$new}</h2><br>";
//    }
//});

//for admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});


