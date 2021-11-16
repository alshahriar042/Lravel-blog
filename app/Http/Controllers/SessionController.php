<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('register.login');
    }

    public function store()
    {
         $attributes=  request()->validate([
            'email' => 'required',
            'password' => 'required',
           ]);

           if(! Auth::attempt($attributes)){
               throw ValidationException::withMessages([
                   'email'=> 'Your Provided Credentials Could not be verified'
               ]);

           }
           session()->regenerate();
           return redirect('/')->with('success','wellcome back');


      }


    public function destroy(){
     //ddd('Goodbye');
     Auth::logout();
     return redirect('/');
    }
}
