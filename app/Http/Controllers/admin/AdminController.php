<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Support\Facades\Hash;
use App\Models\Building;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $buildings = Building::all();
        return view('admin.index', compact('buildings'));
    }

    public function loadSection($section)
    {
        switch ($section) {
            case 'buildingsAdd':
                return view('admin.sections.buildings-create');
            case 'buildingsList':
                $buildings = Building::all();
                return view('admin.sections.buildings-list', compact('buildings'));
            case 'apartmentsAdd':
                return view('admin.sections.apartments-create');
            case 'apartmentsList':
                $apartments = Apartment::all();
                return view('admin.sections.apartments-list', compact('apartments'));
            default:
                return 'Section not found.';
        }
    }

    public function showRegisterForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'apartment_number' => 0,
        ]);

        return redirect()->route('admin.panel')->with('success', 'Admin successfully registered.');
    }

    public function editProfile()
    {
        $admin = auth()->user();
        return view('admin.edit', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

        if ($request->filled('password')) {
            $admin->password = bcrypt($request->input('password'));
        }

        $admin->save();

        return redirect()->route('admin.edit')->with('success', 'Profile updated successfully.');
    }
}
