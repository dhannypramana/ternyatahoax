<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
        return view('admin.dashboard', [
            'active' => 'dashboard'
        ]);
    }
    public function unreviewed()
    {
        return view('admin.unreviewed', [
            'active' => 'unreviewed'
        ]);
    }
    public function reviewed()
    {
        return view('admin.reviewed', [
            'active' => 'reviewed'
        ]);
    }
    public function manageAdmins()
    {
        return view('admin.manage', [
            'admins' => Admin::all()->except(auth('admins')->id(1)),
            'active' => 'manage'
        ]);
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

        $request->session()->flash('successAdd', 'Sukses menambah data admin');
        return redirect('/admin/dashboard/manage');
    }

    public function deleteAdmin($id)
    {
        Admin::destroy($id);
        return back()->with('success', 'Success delete admin');
    }

    public function addAdmin()
    {
        return view('admin.register');
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
        return redirect('/');
    }
}
