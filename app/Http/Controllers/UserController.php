<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user(); // Giriş yapmış kullanıcıyı getirir
        return view('user.dashboard', compact('user')); // 'user.profile' Blade dosyasına yönlendirir
    }
    public function payments()
    {
        $user = Auth::user(); // Giriş yapmış kullanıcıyı alıyoruz
        $apartmentNumber = $user->apartment_number; // Kullanıcının apartment_number'ını alıyoruz

        // apartment_number'a göre ödemeleri çekiyoruz
        $payments = Payment::where('apartment_number', $apartmentNumber)->get();

        // payments Blade dosyasına gönderiyoruz
        return view('user.payments', compact('payments'));
    }
    public function dashboard()
    {
        $user = Auth::user();
        $apartmentNumber = $user->apartment_number;
        $payments = Payment::where('apartment_number', $apartmentNumber)->get();
        return view('user.dashboard', compact('user', 'payments'));
    }

    public function editAccount()
    {
        $user = Auth::user();
        return view('user.edit-account', compact('user'));
    }

    public function updateAccount(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('user.dashboard')->with('success', 'Account updated successfully.');
    }
    public function services()
    {
        // Gerekli servis bilgilerini alıp, view'a gönderin.
        $services = Service::all(); // Örneğin, tüm servisleri çekiyoruz.

        return view('user.services', compact('services'));
    }
}
