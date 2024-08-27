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
        // Sadece role değeri 'resident' olan kullanıcıları getirin
        $residents = User::where('role', 'resident')->with('building', 'apartment')->get();

        return view('residents.list', compact('residents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'building_id' => 'required|exists:buildings,id',
            'apartment_id' => 'required|exists:apartments,id',
            'password' => 'required|min:8|confirmed',
            // 'phone_number' alanını zorunlu olarak eklemedik.
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'building_id' => $request->building_id,
            'apartment_id' => $request->apartment_id,
            'phone_number' => $request->phone_number, // Phone number zorunlu değil, bu yüzden eklenebilir
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $resident->id,
            'apartment_id' => 'required',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $resident->name = $request->name;
        $resident->email = $request->email;
        $resident->apartment_id = $request->apartment_id;
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
