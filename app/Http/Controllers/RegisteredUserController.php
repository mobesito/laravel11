<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

use function Laravel\Prompts\confirm;

class RegisteredUserController extends Controller
{
    //create
    public function create()
    {
        return view('auth.register');
    }

    //store
    public function store()
    {
        //validate
        $val_attr = request()->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(8)->letters()->numbers()->symbols()->mixedCase(), 'confirmed']//the confirmed validations will look for field_confirmation (password_confirmation), it is important to name the field correctly
        ]);

        //store
        $user = User::create($val_attr);
        //login
        Auth::login($user);
        //redirect
        return redirect('/jobs');
    }

}
