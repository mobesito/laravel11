<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;

//----------    HOME    ---------------------------
Route::view('/', 'home');

//--------------    Jobs    -----------------------
Route::resource('jobs', JobController::class);

//-----------   Contact     -------------------
Route::view('/contact', 'contact');

Route::resource('posts', PostsController::class);

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);

