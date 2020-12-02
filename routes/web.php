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

//----------- Accueil Connexion Inscription -------------------------------------------------------------------------------
Route::get('/', function () {
    return view('index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Auth::routes();


//----------- Utilisateur -------------------------------------------------------------------------------
Route::get('user/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');

Route::get('user/update', [App\Http\Controllers\UserController::class, 'showUpdateInfos'])->name('user.update');

Route::put('user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::put('user/updatePassword', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('user.updatePassword');


//----------- Show IT-------------------------------------------------------------------------------
Route::resource('/show-its', App\Http\Controllers\ShowItController::class);


//----------- Commentaires -------------------------------------------------------------------------------
Route::resource('/comments', App\Http\Controllers\CommentController::class);


