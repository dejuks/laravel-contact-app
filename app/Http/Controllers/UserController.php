<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{
    //
    public function register()
    {
        return view('user.register');
    }

    public function login()
    {
        return view('user.login');
    }

    public function checkuser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:3'
        ]);
        $result = Auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->password);
        if ($result) {
            return redirect('contact-list')->with('success', 'Successfully Logged In');
        } else {
            return back()->with('error', 'Failed to Login please check your Email or Password');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'name' => 'required'
        ]);
        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(10),
            ]
        );
        if ($user) {
            return redirect('login')->with('success', 'Your Account is created Successfully!');
        } else {
            return back()->with('error', 'failed to create account check later');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
