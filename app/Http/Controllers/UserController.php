<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function register()
    {
        return view('user.register');
    }

    public function home()
    {
        return view('user.home');
    }

    public function lapor()
    {
        return view('user.lapor');
    }

    public function fact()
    {
        return view('user.fact');
    }

    public function hoax()
    {
        return view('user.hoax');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $request->session()->flash('success', 'Registration Sucess, Please Login');
        return redirect('/login');        
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = request([
            'username',
            'password'
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->with('error', 'Username or Password does not match');
        }
        
        $request->session()->regenerate();
        return redirect('/home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
