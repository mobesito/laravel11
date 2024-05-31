<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\RequiresElement;

//---------- home page route ------------------
Route::get('/', function () {
   return view('home');
});

//---------- INDEX ------------------
Route::get('/jobs', function (){
    /* $job = Job::with('employer')->get(); */
    $job = Job::with('employer')->latest()->paginate(3);//simplePaginate() and cursorPaginate() are more efficient for large database queries
    return view('jobs.index',[
        'jobs' =>  $job
    ]);
});

//-------- SAVE -------------

Route::post('/jobs', function(){

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'employer_id' => 1,
        'title' => request('title'),
        'salary'=> request('salary')

    ]);

    return redirect('/jobs');
});

//-------- CREATE -------------

Route::get('/jobs/create', function(){
    return view('jobs.create');
});

//------- EDIT ---------------------
Route::get('/jobs/{id}/edit', function($id){

    $job = Job::find($id);
    if(! $job ) abort(404);

    return view('jobs.edit', ['job' => $job]);
});

//---------- UPDATE --------------------
Route::patch('/jobs/{id}', function($id){

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    //authorize (on hold...)


    $job = Job::findOrFail($id);
    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    return redirect('/jobs/'.$job->id);

});

//---------- DELETE
Route::delete('/jobs/{id}', function($id){

    $job = Job::findOrFail($id);
    $job->delete();
    return redirect('/jobs');

});

//---------- SHOW --------------------
Route::get('/jobs/{id}', function($id){

    $job = Job::find($id);
    if(! $job ) abort(404);

    return view('jobs.show', ['job' => $job]);
});

//---------- contact page route -----------------
Route::get('/contact', function(){
    return view('contact');
});
