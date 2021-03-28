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

Route::get('/name/{name}', function(string $name): string
{
    return "hello, {$name}";
});

Route::get('/welcome/{name}', function(string $name): string
{
    return "<h1>Добро пожаловать на сайт, {$name}</h1>";;
});

Route::get('/info', function()
{
    return 'Это учебный проект с курса по Laravel';
});

Route::get('/news', function()
{
    $news = ['первая новость', 'вторая новость'];

    foreach ($news as $new){
        echo "<h2>{$new}</h2><br>";
    }
});
