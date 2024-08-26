<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    public function showLoginForm(){
        return view('admin.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            if(Auth::user()->role === 'admin'){
                return redirect()->route('admin.panel');
            }
        }
        return redirect('/admin/login')->withErrors([
            'error' => 'Login unsuccessful'
        ]);
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('home');
    }

}
