<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function create()
    {
        return view('residents.create');
    }

    public function index()
    {
        $residents = User::all();
        return view('residents.list', compact('residents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:residents',
            'apartment_number' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'apartment_number' => $request->apartment_number,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('residents.list')->with('success', 'Resident successfully created.');
    }
}
