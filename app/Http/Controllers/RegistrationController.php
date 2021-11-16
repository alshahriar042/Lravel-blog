<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attribute = request()->validate([
            'name' => 'required|max:255',
            'user_name' => 'required|min:3|max:255|unique:users,user_name',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);

        $user = User::create($attribute);
        Auth::login($user);
        return redirect('/');
    }
}
