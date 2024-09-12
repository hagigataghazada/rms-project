<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResidentController extends Controller
{
    public function create()
    {
        return view('residents.create');
    }

    public function index()
    {
        $residents = User::where('role', 'resident')->get();
        return view('residents.list', compact('residents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'building_number' => 'required|integer|exists:buildings,building_number',
            'apartment_number' => 'required|integer|exists:apartments,apartment_number',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'building_number' => $request->building_number,
            'apartment_number' => $request->apartment_number,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
            'role' => 'resident',
        ]);

        return redirect()->route('residents.list')->with('success', 'Resident created successfully.');
    }

    public function edit($id)
    {
        $resident = User::findOrFail($id);
        return view('residents.edit', compact('resident'));
    }

    public function update(Request $request, $id)
    {
        $resident = User::findOrFail($id);

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:residents,email,' . $id,
            'building_number' => 'required|string',
            'apartment_number' => 'required|string',
            'password' => 'nullable|confirmed|min:6',
        ];

        if ($request->phone_number != $resident->phone_number) {
            $rules['phone_number'] = 'nullable|string|max:20|unique:residents,phone_number';
        }

        $resident->name = $request->name;
        $resident->email = $request->email;
        $resident->building_number = $request->building_number;
        $resident->apartment_number = $request->apartment_number;

        if ($request->phone_number != $resident->phone_number) {
            $resident->phone_number = $request->phone_number;
        }

        if ($request->filled('password')) {
            $resident->password = bcrypt($request->password);
        }

        $resident->save();

        return redirect()->route('residents.list')->with('success', 'Resident updated successfully.');
    }

    public function destroy($id)
    {
        $resident = User::findOrFail($id);
        $resident->delete();

        return redirect()->route('residents.list')->with('success', 'Resident deleted successfully.');
    }
}
