<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function store()
    {
        $formData=request()->validate([
            'name'=>['min:3','required','max:15'],
            'username'=>['min:3','required','max:15'],
            'email'=>['required','email',Rule::unique('users', 'email')],
            'password'=>['max:15','required','min:3']
        ], [
            'password.required'=>"Your password doesn't should be blank.",
            'password.min'=>"Password must be more than 3 characters."
        ]);
        $user=User::create($formData);
        auth()->login($user);
        return redirect('/')->with('success', 'Thanks for Registration');
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Bye');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function postLogin()
    {
        $formData=request()->validate([
            'email'=>['required','email',Rule::exists('users', 'email')],
            'password'=>['required','min:3','max:15']
        ], [
            'email.required'=>"Your email doesn't should be blank.",
            'email.exists'=>'Your email is invalid.',
            'password.required'=>"Your password doesn't should be blank.",
            'password.min'=>"Password must be more than 3 characters."
        ]);
        if (auth()->attempt($formData)) {
            return redirect('/')->with('success', 'Welcome back '.auth()->user()->name);
        } else {
            return redirect()->back()->withErrors([
                'password'=>'Email and Password does not match.'
            ]);
        };
    }
}
