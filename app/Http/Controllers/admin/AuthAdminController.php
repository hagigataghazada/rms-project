<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    // Admin login formunu göster
    public function showLoginForm()
    {
        return view('front.home');
    }

    // Admin giriş işlemini gerçekleştir
    public function login(Request $request)
    {
        // Giriş bilgilerini doğrula
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        // Giriş bilgilerini kontrol et ve kullanıcının admin olup olmadığını doğrula
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.panel');
            } else {
                Auth::logout();
                return redirect()->route('home');
            }
        }


    }

    // Admin çıkış işlemi
    public function logout(Request $request)
    {
        Auth::logout();

        // Oturumu tamamen sonlandır ve token'ı yenile
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Çıkış yaptıktan sonra ana sayfaya yönlendir
        return redirect()->route('home');
    }
}
