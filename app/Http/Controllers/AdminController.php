<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function register()
    {
        return view('admin.register');
    }
    public function dashboard()
    {
        return view('admin.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        $request->session()->flash('success', 'Registration Sucess, Please Login');
        return redirect('/admin/login');
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

        if (Auth::guard('admins')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/admin/dashboard');
        }
        
        return back()->with('error', 'Username or Password does not match');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
