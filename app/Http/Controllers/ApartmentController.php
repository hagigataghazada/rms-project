<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function create()
    {
        return view('apartments.create');
    }
    public function index()
    {
        $apartments = Apartment::all(); // Bu, tüm apartmanları listeler
        return view('apartments.list', compact('apartments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'apartment_id' => 'required|unique:apartments,apartment_id',
            'room_count' => 'required|integer',
            'floor_number' => 'required|integer',
            'status' => 'required',
            'building_id' => 'required|exists:buildings,building_id',
        ]);

        Apartment::create($request->all());

        return redirect()->route('apartments.list')->with('success', 'Apartman başarıyla eklendi.');
    }

    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('apartments.edit', compact('apartment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'apartment_id' => 'required|unique:apartments,apartment_id,'.$id,
            'room_count' => 'required|integer',
            'floor_number' => 'required|integer',
            'status' => 'required',
            'building_id' => 'required|exists:buildings,building_id',
        ]);

        $apartment = Apartment::findOrFail($id);
        $apartment->update($request->all());

        return redirect()->route('apartments.index')->with('success', 'Apartman başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->delete();

        return redirect()->route('apartments.index')->with('success', 'Apartman başarıyla silindi.');
    }

    public function announcements(Request $request)
    {
        // Filtreleme işlemi
        $status = $request->input('status'); // "for_sale" veya "for_rent"

        $query = Apartment::query();

        if ($status) {
            $query->where('status', $status);
        }

        $apartments = $query->get();

        return view('announcements', compact('apartments'));
    }
}
