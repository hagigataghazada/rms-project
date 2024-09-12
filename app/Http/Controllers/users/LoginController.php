<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::check()) {
                if (Auth::user()->role == 'admin') {
                    return redirect()->route('admin.panel');
                } elseif (Auth::user()->role == 'resident') {
                    return redirect()->route('user.dashboard');
                }
            }
        }

        return redirect()->back()->withErrors([
            'error' => 'Email və ya Şifrə yalnışdır'
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }

    protected function redirectTo()
    {
        if (auth()->user()->role == 'resident') {
            return '/user/dashboard';
        } else {
            return route('admin.panel');
        }
    }
}
