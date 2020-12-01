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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');


Route::resource('/users', 'UserController');

Route::get('user/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');

Route::get('user/update', [App\Http\Controllers\UserController::class, 'showUpdateInfos'])->name('user.update');

Route::put('user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::put('user/updatePassword', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('user.updatePassword');


Route::resource('/show-its', 'ShowItController');

Route::post('showit/postShowIt', [App\Http\Controllers\ShowItController::class, 'postShowIt'])->name('showit.postShowIt');

Route::put('showit/updateShowIt/{showIt}', [App\Http\Controllers\ShowItController::class, 'updateShowIt'])->name('showit.updateShowIt');

Route::delete('showit/deleteShowIt/{showIt}', [App\Http\Controllers\ShowItController::class, 'deleteShowIt'])->name('showit.deleteShowIt');


Route::resource('/comments', 'CommentController');

Route::post('comment/postComment', [App\Http\Controllers\CommentController::class, 'postComment'])->name('comment.postComment');

Route::delete('comment/deleteComment/{comment}', [App\Http\Controllers\CommentController::class, 'deleteComment'])->name('comment.deleteComment');


