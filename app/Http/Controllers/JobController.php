<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Mail\JobPosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{

    //--------------    INDEX   ----------------------
    public function index()
    {

        /* $job = Job::with('employer')->get(); */
        $job = Job::with('employer')->latest()->paginate(10);//simplePaginate() and cursorPaginate() are more efficient for large database queries

        return view('jobs.index',[
            'jobs' =>  $job
        ]);

    }

    //--------------    STORE    ------------------------
    public function store()
    {

        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job = Job::create([
            'employer_id' => 1,
            'title' => request('title'),
            'salary'=> request('salary')

        ]);

        Mail::to($job->employer->user->email)->send(
            new JobPosted($job)
        );

        return redirect('/jobs');

    }

    //--------------    CREATE  -------------------------
    public function create()
    {

        return view('jobs.create');

    }

    //--------------    EDIT    -------------------------
    public function edit(Job $job)
    {
        //gate defined in app/Providers/AppServiceProvider.php
        /* Gate::authorize('edit-job', $job); */

        if(! $job ) abort(404);
        return view('jobs.edit', ['job' => $job]);

    }

    //---------------   UPDATE  --------------------------
    public function update(Job $job)
    {

        //authorize (on hold...)
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        return redirect('/jobs/'.$job->id);

    }

    //---------------   DESTROY  ----------------------------
    public function destroy(Job $job)
    {

        $job->delete();
        return redirect('/jobs');

    }

    //--------------    SHOW    -----------------------------
    public function show(Job $job)
    {

        return view('jobs.show', ['job' => $job]);

    }

}
