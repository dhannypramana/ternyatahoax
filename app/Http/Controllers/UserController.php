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
        if (auth('admins')->check()) {
            return redirect('/admin/dashboard');
        }

        return view('user.home', [
            'active' => 'home'
        ]);
    }

    public function fact()
    {
        return view('user.fact', [
            'active' => 'fact'
        ]);
    }

    public function hoax()
    {
        return view('user.hoax', [
            'active' => 'hoax'
        ]);
    }

    public function profile(User $user)
    {
        return view('user.profile', [
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:2|max:32',
            'last_name' => 'required|min:2|max:32',
            'no_telepon_wa' => 'required|min:11',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'username' => 'required|unique:users|min:4',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:4|max:32'
        ]);

        User::create([
            'full_name' => $request->first_name . " " . $request->last_name,
            'no_telepon_wa' => $request->no_telepon_wa,
            'tgl_lahir' => $request->tgl_lahir,
            'gender' => $request->gender,
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
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect('/');
    }
}
