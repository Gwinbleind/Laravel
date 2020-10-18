<?php

use App\Http\Controllers\Admin\IndexController as IndexController;
use App\Http\Controllers\HomeController as HomeController;
use App\Http\Controllers\NewsController as NewsController;
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

Route::get('/',[HomeController::class,'index'])
    ->name('home');

Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->group(function () {
        Route::get('/',[IndexController::class,'index'])
            ->name('home');
        Route::match(['get','post'],'/add',[NewsController::class,'create'])
            ->name('add');
});

Route::name('news.')
    ->prefix('news')
    ->group(function() {
        Route::get('/',[NewsController::class,'index'])
            ->name('all');
        Route::get('/category/{slug}',[NewsController::class,'showNewsByCategory'])
            ->name('byCategory');
        Route::get('/category',[NewsController::class,'showCategories'])
            ->name('categories');
        Route::get('/{slug}',[NewsController::class,'showArticle'])
            ->where('slug', '[A-Za-z_0-9]+')
            ->name('oneArticle');
    });

Route::view('/about', 'about')
    ->name('about');

Route::view('/vue','vue')->name('vue');
Route::view('/test','welcome');
Route::view('/auth','auth')->name('auth');
