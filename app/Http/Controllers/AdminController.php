<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Report;
use App\Models\User;
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
            'active' => 'dashboard',
            'unreviewed_reports_total' => Report::where('isReviewed', 0)->count(),
            'reviewed_reports_total' => Report::where('isReviewed', 1)->count(),
            'reports_total' => Report::count(),
            'fakta_total' => Report::where('status_report', 1)->count(),
            'hoax_total' => Report::where('status_report', 0)->count(),
            'admins_total' => Admin::count(),
            'users_total' => User::count(),
        ]);
    }

    public function manageAdmins()
    {
        return view('admin.manage', [
            'admins' => Admin::whereNotIn('id', [auth('admins')->id(1)])->paginate(5),
            'active' => 'manage'
        ]);
    }
    public function manageUsers()
    {
        return view('admin.manage-users', [
            'users' => User::paginate(5),
            'active' => 'manage-users'
        ]);
    }
    public function detailManageUsers(User $user)
    {
        return view('admin.detail-users', [
            'user' => $user,
            'active' => 'manage-users'
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins|min:3|max:32',
            'password' => 'required|min:4|max:32'
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

    public function deleteUser($id)
    {
        User::destroy($id);
        return back()->with('success', 'Success delete User');
    }

    public function addAdmin()
    {
        return view('admin.register');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:32',
            'password' => 'required|min:4|max:32'
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
        Auth::guard('admins')->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect('/');
    }
}
