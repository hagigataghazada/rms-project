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
        $user = auth()->user();
        return view('user.dashboard', compact('user'));
    }

    public function payments()
    {
        $user = Auth::user();
        $apartmentNumber = $user->apartment_number;


        $payments = Payment::where('apartment_number', $apartmentNumber)->get();

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

        return redirect()->route('user.dashboard')->with('success', 'Account information successfully updated.');
    }

    public function services()
    {
        $services = Service::all();

        return view('user.services', compact('services'));
    }
}
