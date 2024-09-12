<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        if (request()->ajax()) {
            return view('admin.register-form');
        }
        return view('admin.login');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:15|unique:users',
            'avatar' => 'nullable|string|max:255',
            'password' => 'required|string|min:6|confirmed'
        ]);

        try {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'avatar' => $validated['avatar'] ?? null,
                'password' => Hash::make($validated['password']),
                'role' => 'admin',
            ]);

            auth()->login($user);

            return redirect('/login')->with('success', 'Registration Successful!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred during registration.'])->withInput();
        }
    }
}
