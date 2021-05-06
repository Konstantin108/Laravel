<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UnloadingController as AdminUnloadingController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use \App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ParserController;
use \App\Http\Controllers\SocialiteController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/news', [NewsController::class, 'index'])
    ->name('news');

Route::get('/message', [NewsController::class, 'message'])
    ->name('message');

Route::get('/answer', [NewsController::class, 'answer'])
    ->name('answer');

Route::get('/category', [CategoryController::class, 'index'])
    ->name('category');

Route::post('/messageStore', [NewsController::class, 'messageStore'])
    ->name('messageStore');

Route::get('/indexByCategoryId/{id}', [NewsController::class, 'indexByCategoryId'])
    ->where('id', '\d+')
    ->name('indexByCategoryId');

Route::get('/news/show/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

Route::get('/category/show/{id}', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('category.show');

Route::get('/create', [NewsController::class, 'create'])
    ->name('create');


Route::group(['middleware' => 'auth'], function () {
    //for account
    Route::get('/account', AccountController::class)
        ->name('account');
    Route::get('/logout', function (){
        \Auth::logout();
        return redirect()->route('login');
    })->name('logout');

    //for account (profile settings)
    Route::get('/profile/editProfile/{id}', [ProfileController::class, 'editProfile'])
        ->where('id', '\d+')
        ->name('editProfile');
    Route::resource('/profile',ProfileController::class);

    //for admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        Route::resource('/category', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/create', AdminNewsController::class);
        Route::resource('/unloading', AdminUnloadingController::class);
        Route::resource('/user', AdminUsersController::class);
    });

    Route::get('parsing', ParserController::class)
        ->name('parsing');

    Route::get('admin/news/delete/{id}', [AdminNewsController::class, 'delete'])
        ->where('id', '\d+')
        ->name('delete');

    Route::get('admin/category/deleteCategory/{id}', [AdminCategoryController::class, 'deleteCategory'])
        ->where('id', '\d+')
        ->name('deleteCategory');

    Route::get('admin/users/deleteUser/{id}', [AdminUsersController::class, 'deleteUser'])
        ->where('id', '\d+')
        ->name('deleteUser');
});

Route::get('/collections', function () {
    $collect = collect([
        'id' => 1,
        'age' => '30',
        'name' => 'kostya',
        'description' => 'programmer'
    ]);
    dd($collect->only('description'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

//for guest
Route::group(['middleware' => 'guest', 'prefix' => 'socialite'], function (){
    Route::get('/auth/vk', [SocialiteController::class, 'init'])
        ->name('vk.init');
    Route::get('/auth/vk/callback', [SocialiteController::class, 'callBack'])
        ->name('vk.callback');
});
