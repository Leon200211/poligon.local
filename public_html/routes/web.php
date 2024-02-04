<?php

use Illuminate\Support\Facades\Auth;
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

Route::resource('rest',\App\Http\Controllers\RestTestController::class)->names('restTest');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'blog'], function () {
    Route::resource('posts', \App\Http\Controllers\Blog\PostController::class)->names('blog.posts');
});

Route::group(['prefix' => 'admin/blog'], function () {
    $methods = ['index', 'create', 'store', 'edit', 'update'];
    Route::resource('categories', \App\Http\Controllers\Blog\Admin\CategoryController::class)
        ->only($methods)
        ->names('admin.blog.categories');

    Route::resource('posts', \App\Http\Controllers\Blog\Admin\PostController::class)
        ->except(['show'])
        ->names('admin.blog.posts');
});
