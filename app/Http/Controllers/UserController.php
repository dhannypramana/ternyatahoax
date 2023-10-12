<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public function blog(Report $report)
    {
        return view('user.detail', [
            'active' => 'active',
            'report' => $report
        ]);
    }

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
            'active' => 'home',
            'reports' => Report::latest()->paginate(1)
        ]);
    }

    public function fact()
    {
        return view('user.fact', [
            'active' => 'fact',
            'reports' => Report::where('status_report', 1)->paginate(5)
        ]);
    }

    public function hoax()
    {
        return view('user.hoax', [
            'active' => 'hoax',
            'reports' => Report::where('status_report', 0)->paginate(5)
        ]);
    }

    public function profile(User $user)
    {
        if (auth()->user()->username !== $user->username) {
            abort('404');
        }

        return view('user.profile', [
            'active' => 'user',
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        if (auth()->user()->username !== $user->username) {
            abort('404');
        }

        return view('user.edit-profile', [
            'active' => 'user',
            'user' => $user
        ]);
    }

    public function edit_profile(User $user, Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'no_telepon_wa' => 'required|min:11',
            'gender' => 'required',
            'tgl_lahir' => 'required'
        ]);

        $user->update([
            'full_name' => $request->full_name,
            'no_telepon_wa' => $request->no_telepon_wa,
            'tgl_lahir' => $request->tgl_lahir,
            'gender' => $request->gender,
            'username' => $user->username,
            'email' => $user->email,
        ]);

        $username = $user->username;

        $request->session()->flash('updateSuccess', 'Kamu telah berhasil melakukan update profile kamu');
        return redirect('/profile/' . $username);
    }

    public function activity_log(User $user)
    {
        return view('user.activity-log', [
            'active' => 'user',
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

        $user = User::create([
            'full_name' => $request->first_name . " " . $request->last_name,
            'no_telepon_wa' => $request->no_telepon_wa,
            'tgl_lahir' => $request->tgl_lahir,
            'gender' => $request->gender,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        event(new Registered($user));

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
        if (auth()->user()->email_verified_at == null) {
            return redirect('/email/verify');
        } else {
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect('/');
    }
}
