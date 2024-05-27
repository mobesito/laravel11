<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

//---------- home page route ------------------
Route::get('/', function () {
   return view('home');
});

//---------- jobs page route ------------------
Route::get('/jobs', function (){
    return view('jobs',[
        'jobs' =>  Job::all()
    ]);
});

//---------- job page route --------------------
Route::get('/jobs/{id}', function($id){
   
    $job = Job::find($id);
    if(! $job ) abort(404);

    return view('job', ['job' => $job]);
});

//---------- contact page route -----------------
Route::get('/contact', function(){
    return view('contact');
});