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
            'apartment_number' => 'required|unique:apartments,apartment_number',
            'room_count' => 'required|integer',
            'floor_number' => 'required|integer',
            'status' => 'required|in:occupied,for rent,for sale,repair',
            'price' => 'nullable|numeric', // price alanı artık required değil, nullable oldu
            'building_number' => 'required|exists:buildings,building_number',
        ]);

        Apartment::create($request->all());
        return redirect()->route('apartments.list')->with('success', 'Apartment added successfully.');
    }

    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('apartments.edit', compact('apartment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'apartment_number' => 'required|unique:apartments,apartment_number,'.$id,
            'room_count' => 'required|integer',
            'floor_number' => 'required|integer',
            'status' => 'required|in:occupied,for rent,for sale,repair',
            'building_number' => 'required|exists:buildings,building_number',
        ]);

        $apartment = Apartment::findOrFail($id);
        $apartment->update($request->all());

        return redirect()->route('apartments.list')->with('success', 'Apartman başarıyla güncellendi.');
    }


    public function destroy($id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->delete();

        return redirect()->route('apartments.list')->with('success', 'Apartman başarıyla silindi.');
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
    public function showForSaleApartments(Request $request)
    {
        $apartments = Apartment::where('status', 'for sale');

        if ($request->min_price) {
            $apartments->where('price', '>=', $request->min_price);
        }

        if ($request->max_price) {
            $apartments->where('price', '<=', $request->max_price);
        }

        $apartments = $apartments->get();

        return view('for-sale', compact('apartments'));
    }

    public function showForRentApartments(Request $request)
    {
        $apartments = Apartment::where('status', 'for rent');

        if ($request->min_price) {
            $apartments->where('price', '>=', $request->min_price);
        }

        if ($request->max_price) {
            $apartments->where('price', '<=', $request->max_price);
        }

        $apartments = $apartments->get();

        return view('for-rent', compact('apartments'));
    }
}
