<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/users', 'UserController');

Route::resource('/show-its', 'ShowItController');

Route::resource('/comments', 'CommentController');

Route::get('user/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');

Route::get('user/infos', [App\Http\Controllers\UserController::class, 'show'])->name('user.infos');

Route::put('user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
