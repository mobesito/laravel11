<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store() {
        //Laravel handles it and redirects to the form if validation fails
        $attrs = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(!Auth::attempt($attrs)){
            //Laravel handles it and redirects to the form if authentication fails
            throw ValidationException::withMessages([
                'email' => 'Sorry, wrong email or password provided'
            ]);
        }

        //this is a security measure that regenerates the session token in yur browser every time you login.
        //that way if a potential hacker gains access to an old one it will no longer work.
        request()->session()->regenerate();

        return redirect('/jobs');
    }

    public function destroy(){
        Auth::logout();
        return redirect('/');
    }

}
