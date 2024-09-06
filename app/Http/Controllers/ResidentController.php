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
        $residents = User::where('role', 'resident')->get(); // Sadece 'resident' rolündeki kullanıcıları çekiyoruz
        return view('residents.list', compact('residents'));
    }

    public function store(Request $request)
    {
//        dd($request->all());

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'building_number' => 'required|integer|exists:buildings,building_number',
            'apartment_number' => 'required|integer|exists:apartments,apartment_number',
            'password' => 'required|min:8|confirmed',
            // 'phone_number' alanını zorunlu olarak eklemedik.
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

        return redirect()->route('residents.list')->with('success', 'Resident successfully created.');
    }
    public function edit($id)
    {
        $resident = User::findOrFail($id);
        return view('residents.edit', compact('resident'));
    }

    public function update(Request $request, $id)
    {
        $resident = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'building_number' => 'required|exists:buildings,building_number',
            'apartment_number' => 'required|exists:apartments,apartment_number',
            'phone_number' => 'required|integer|unique:users,phone_number,',
            'password' => 'nullable|confirmed|min:8',
        ]);

        $resident->name = $request->name;
        $resident->email = $request->email;
        $resident->building_number = $request->building_number;
        $resident->apartment_number = $request->apartment_number;
        $resident->phone_number=$request->phone_number;
        if ($request->password) {
            $resident->password = bcrypt($request->password);
        }
        $resident->save();

        return redirect()->route('residents.list')->with('success', 'Resident successfully updated.');
    }

    public function destroy($id)
    {
        $resident = User::findOrFail($id);
        $resident->delete();

        return redirect()->route('residents.list')->with('success', 'Resident successfully deleted.');
    }
}
