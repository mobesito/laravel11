<?php

use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;

//----------    HOME    ---------------------------
Route::view('/', 'home');

//--------------    Jobs    -----------------------
/* Route::resource('jobs', JobController::class)->only(['index', 'show', 'create']);
Route::resource('jobs', JobController::class)->except(['index', 'show'])->middleware(['auth', 'can:edit,job']); */
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store']);
Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
    ->middleware('auth')
    ->can('edit', 'job');

//-----------   Contact     -------------------
Route::view('/contact', 'contact');


//-----------   Posts   -----------------------
Route::post('/posts', [PostsController::class, 'store']);
Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/create', [PostsController::class, 'create'])->middleware('auth');


//-----------   Register    -------------------------

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/register/delete', [RegisteredUserController::class, 'destroy']);


//---------     Session / Login   ------------------------
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

