<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        if (Auth::attempt($credentials))
        {

            if(Auth::check()){
                if (Auth::user()->role == 'admin'){
                    return redirect()->route('admin.panel');
                }
//                alta route icerisine ve ya redirect icerisine home page  user interfeace sehifesini yolunu yazacaqsan
//                return redirect()->route('')->with('success','Welcome To Lucky Market')->with('name',$name);
            }
        }

        return redirect()->back()->withErrors([
            'error'=>'Email ve ya Sifre hatali'
        ])->withInput();

    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');

    }



//    public function create()
//    {
//        if (request()->ajax()) {
//            return view('admin.login-form');
//        }
//        return view('admin.login');
//    }
//
//    public function login(Request $request)
//    {
//        $credentials = $request->only('email','password');
//
//        if(Auth::attempt($credentials))
//        {
//            $user = Auth::user();
//            $name = $user->name;
//            if(Auth::check()){
//                return redirect()->route('admin.panel',['name' => $name])->with('success','Welcome To Lucky Market')->with('name',$name);
//            }
//        }
//
//        return redirect()->back()->withErrors([
//            'error'=>'Email ve ya Sifre hatali'
//        ])->withInput();
//    }
//
//    public function logout(Request $request)
//    {
//        Auth::logout();
//        $request = session()->invalidate();
//        $request = session()->regenerateToken();
//        return redirect()->route('login');
//
//    }
}


