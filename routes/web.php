<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

//----------    HOME    ---------------------------
Route::view('/', 'home');

//--------------    Jobs    -----------------------
Route::resource('jobs', JobController::class);

//-----------   Contact     -------------------
Route::view('/contact', 'contact');
