<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

//---------- home page route ------------------
Route::get('/', function () {
   return view('home');
});

//---------- jobs page route ------------------
Route::get('/jobs', function (){
    /* $job = Job::with('employer')->get(); */
    $job = Job::with('employer')->paginate(3);//simplePaginate() and cursorPaginate() are more efficient for large database queries
    return view('jobs',[
        'jobs' =>  $job
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
